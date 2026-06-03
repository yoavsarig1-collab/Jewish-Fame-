# אתר פרסי היכל התהילה של המוזיקה היהודית

## ⚠️ כלל ברזל — דיוק ואמינות

**אל תמציא שום עובדה, תאריך, ציטוט או שם.**

האתר מוצג לראש עיר, תורמים ואנשי ציבור. האמינות היא הכל.

- ציטוט ישיר מאדם אמיתי — רק אם יש מקור מאומת
- עובדה היסטורית — רק אם ניתן לאמת
- אם לא בטוח — אל תכתוב, או כתוב "מיוחס ל-"

## פרטי הפרויקט
- אתר: `/Users/yoavsarig/Desktop/Code/hallofame-prize/`
- פריסה: jewishfameaward.netlify.app (כשיש קרדיטים)
- שפות: עברית ראשית + אנגלית (bilingual RTL/LTR)
- סטייל: dark gold — ember `#B0884A`, stage `#121418`, paper `#F7F3EC`
- שרת מקומי לבדיקה: `cd /Users/yoavsarig/Desktop/Code/hallofame-prize && python3 -m http.server 8765`
- צילומי מסך: puppeteer ב-`/Users/yoavsarig/Spent/node_modules/puppeteer/lib/esm/puppeteer/puppeteer.js`, Chrome ב-`/Applications/Google Chrome.app/Contents/MacOS/Google Chrome`

## כללי תוכן
- "מוזיקה" ולא "מוסיקה" (גם אם בתקנון כתוב מוסיקה)
- "אקום" ולא "ACUM" בטקסט עברי
- אחרי כל כתיבת תוכן עברי — להריץ /stop-slop
- מקור הסמכות לקטגוריות ולתוכן: `~/Downloads/תקנון פרס התהילה-סופי.docx` (סוכם ב-memory: project_heichal_takanon)

---

## ✅ הושלם בסשן האחרון (יוני 2026)
- **13 קטגוריות לפי התקנון** (12 תחרותיות + פרס מפעל חיים): זמר, זמרת, חזן/פייטן, זמר ישראלי, זמרת ישראלית, מלחין/מעבד, להקה או הרכב, מלחין/מנצח קלאסי, נגן כלי נשיפה, נגן כלי מיתר, נגן כלי הקשה, נגן/מפיק פופולרי
- **categories.html שוכתב לגמרי**: image grid (4 עמ') + modal לכל קטגוריה עם נבחרים, hover גרייסקייל→צבע, חצים ←→ בין קטגוריות, click-outside לסגירה, אנימציית stagger לשמות. (הוסר ה-tape-machine הישן)
- **11 דפי אמנים נוצרו** עם ביוגרפיות מאומתות (ויקיפדיה + הצלבה) ותמונות אמיתיות: arik-lavie, arik-einstein, shimon-israeli, beni-amdursky, zvika-pick, mati-caspi, zohar-argov, yigal-bashan, uzi-hitman, meir-banai, joe-amar — כולם קטגוריה 04 (זמר ישראלי), כולם "הוכנס לאחר מותו"
- **קטגוריה 04 ב-categories.html** מקשרת לכל 11 הדפים
- **index.html**: פסקת about לפי ניסוח התקנון; "הפכו לשותפי ההיכל" → "לעוד פרטים"; stat 13→12; כפתור וידאו במובייל (מלבן); גריד קטגוריות רספונסיבי
- **ceremony.html**: #programme שונה ל-stage-deep (לא עוד שני כחולים ברצף)
- **donors.html**: כינור → תמונת Carnegie Hall
- **פרס מפעל חיים**: סקשן קולנועי עם תמונת building-pt.jpg ברקע + "13" watermark
- **about.html**: leader-gaon.jpg (תמונה חדשה 2024); object-position של גפני תוקן

## 🔲 ממתין — TODO (מסודר לפי דחיפות)

### תוכן/תמונות
- **מלכה שבדרון** — להחליף תמונה (`leader-shwadron.png`). יואב יספק קובץ חדש.
- **יהורם גאון** — התמונה הנוכחית (leader-gaon.jpg, ספרייה לאומית 2024) בינונית. אם יואב לא מאשר, לחפש טובה יותר.
- **מוזיקה vs מוסיקה** — עוד "מוסיקה" שגוי ב: `category-detail.html` (6), `mati-caspi.html` (1), `ofra-haza.html` (1). להחליף ל"מוזיקה".

### UX/UI — ביקורת מלאה
- להריץ ביקורת UX/UI על כל הדפים (index, about, categories, ceremony, donors, selection-process) — דסקטופ + מובייל 390px. (סוכן הביקורת לא קיבל הרשאת Bash בסשן הקודם — להריץ ידנית עם puppeteer)
- לבדוק התאמת מובייל לכל דף

### פתוח מקודם
- מחקר fundraising pages — איך ארגונים תרבותיים מתרימים
- "נשיא המדינה" → "ראשי המדינה" (לבדוק בכל הדפים — שידור TV מאושר, נוכחות נשיא לא)
- עוד אנשי הנהגה ל-about.html (יואב יספק)
- תמונות טובות יותר: איתן גפני, מלכה שבדרון
- לוגו + נכסי עיצוב — ממתין למעצב גרפי

### פריסה (אחרי שהכל מאושר)
```bash
cd /Users/yoavsarig/Desktop/Code/hallofame-prize
netlify deploy --prod
```

## רשימת קבצי HTML
index, about, categories, ceremony, selection-process, donors, inductee, category-detail, leonard-cohen, ofra-haza + 11 דפי אמנים (לעיל)
