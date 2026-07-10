const DEST = 'yoavsarig1@gmail.com';

function b64url(bytes) {
  let bin = '';
  for (const b of bytes) bin += String.fromCharCode(b);
  return btoa(bin).replace(/\+/g, '-').replace(/\//g, '_').replace(/=+$/, '');
}

function encHeader(s) {
  return '=?UTF-8?B?' + btoa(String.fromCharCode(...new TextEncoder().encode(s))) + '?=';
}

async function getAccessToken(env) {
  const res = await fetch('https://oauth2.googleapis.com/token', {
    method: 'POST',
    headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
    body: new URLSearchParams({
      client_id: env.GMAIL_CLIENT_ID,
      client_secret: env.GMAIL_CLIENT_SECRET,
      refresh_token: env.GMAIL_REFRESH_TOKEN,
      grant_type: 'refresh_token',
    }),
  });
  if (!res.ok) throw new Error('token refresh failed: ' + res.status);
  return (await res.json()).access_token;
}

async function sendMail(env, subject, body, replyTo) {
  const token = await getAccessToken(env);
  const headers = [
    `To: ${DEST}`,
    `From: ${DEST}`,
    replyTo ? `Reply-To: ${replyTo}` : null,
    `Subject: ${encHeader(subject)}`,
    'MIME-Version: 1.0',
    'Content-Type: text/plain; charset=UTF-8',
    'Content-Transfer-Encoding: base64',
  ].filter(Boolean).join('\r\n');
  const mime = headers + '\r\n\r\n' + btoa(String.fromCharCode(...new TextEncoder().encode(body)));
  const res = await fetch('https://gmail.googleapis.com/gmail/v1/users/me/messages/send', {
    method: 'POST',
    headers: { Authorization: `Bearer ${token}`, 'Content-Type': 'application/json' },
    body: JSON.stringify({ raw: b64url(new TextEncoder().encode(mime)) }),
  });
  if (!res.ok) throw new Error('gmail send failed: ' + res.status + ' ' + (await res.text()).slice(0, 200));
}

const clip = (v, n) => String(v ?? '').slice(0, n).trim();

export default {
  async fetch(req, env) {
    const url = new URL(req.url);
    if (url.pathname === '/api/contact' && req.method === 'POST') {
      try {
        const d = await req.json();
        if (d._honey) return Response.json({ ok: true }); // bot trap: pretend success
        const email = clip(d.email, 200);
        const isSignup = d.kind === 'signup';
        if (!email || !email.includes('@')) return Response.json({ ok: false }, { status: 400 });
        let subject, body;
        if (isSignup) {
          subject = 'הרשמה לעדכונים — אתר פרס התהילה';
          body = `אימייל: ${email}\nמקור: ${clip(d.source, 100)}\n`;
        } else {
          const intent = clip(d.intent, 40);
          subject = d.kind === 'meeting' ? 'בקשת פגישה — שותפות וחסות (אתר פרס התהילה)'
                  : intent === 'partner' ? 'פנייה חדשה — הצטרפות כשותפים (אתר פרס התהילה)'
                  : intent === 'founder' ? 'פנייה חדשה — הצטרפות כמייסדים (אתר פרס התהילה)'
                  : 'פנייה חדשה מאתר פרס התהילה — טופס תמיכה';
          body = [
            intent ? `הגיע דרך: ${intent === 'partner' ? 'כפתור "הצטרפו כשותפים"' : 'כפתור "הצטרפו כמייסדים"'}` : null,
            `שם: ${clip(d.first_name, 100)} ${clip(d.last_name, 100)}`,
            `אימייל: ${email}`,
            `ארגון: ${clip(d.org, 200) || '—'}`,
            '',
            'הודעה:',
            clip(d.message, 5000) || '—',
          ].filter(l => l !== null).join('\n');
        }
        await sendMail(env, subject, body, email);
        return Response.json({ ok: true });
      } catch (e) {
        return Response.json({ ok: false }, { status: 500 });
      }
    }
    return env.ASSETS.fetch(req);
  },
};
