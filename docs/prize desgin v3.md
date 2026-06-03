# DESIGN.md — Jewish Music Hall of Fame Awards (Prize Site)

Apply this design system to every page generated. This is the source of truth.

---

## 1. PROJECT CONTEXT

This is the website for the **Jewish Music Hall of Fame Awards** (טקס פרסי היכל התהילה של המוזיקה היהודית) — a state-level prize for Jewish music.

**Inaugural ceremony — locked facts:**
- **Date:** December 28, 2027
- **Primary venue:** היכל התרבות, פתח תקווה (Cultural Center, Petah Tikva)
- **Award presenter:** President of the State of Israel
- **Officials present:** Prime Minister, Minister of Culture, Mayor of Petah Tikva, Chair of Mitar Hall of Fame Society, Chair of World Trustees Council, Chair of the Zionist Federation
- **Broadcast:** Live television in Israel + worldwide digital broadcast
- **Companion ceremony:** A second event in **Los Angeles** (date TBD), produced in partnership with the LA Jewish community — folded into this same site as a dedicated page until full details are confirmed
- **Cycle frame:** Aligned with Petah Tikva's 150th anniversary (2028)

The site is the sibling of the permanent Hall of Fame Building website. Award winners are inducted into the permanent Hall — the two sites cross-link.

**Bilingual:** Hebrew (primary, RTL) + English. Always design both.

**Tone:** Institutional. Ceremonial. Editorial. Think Grammy Awards × Nobel Prize × Yad Vashem.
**Tone is NOT:** festival, SaaS, nonprofit donation page, music streaming app, government ministry.
**North star:** *"The night Jewish music takes its rightful place in history."*
**Fundraising tagline:** *"הצליל של עמנו / The Sound of Our People."*

---

## 2. THE OFFICIAL 12 CATEGORIES (LOCKED FOR 2027)

This is the authoritative list per the regulations document. The Stitch designs and content must match this exactly.

| # | Hebrew | English | Scope |
|---|---|---|---|
| 01 | זמר | Male Vocalist | All languages and styles |
| 02 | זמרת | Female Vocalist | All languages and styles |
| 03 | חזן / פייטן | Cantor / Paytan | Ashkenazi or Mizrahi tradition |
| 04 | זמר ישראלי | Israeli Male Vocalist | Hebrew song, pop, rock |
| 05 | זמרת ישראלית | Israeli Female Vocalist | Hebrew song, pop, rock |
| 06 | זמר/ת ים-תיכוני | Mediterranean Vocalist | Israel + Eastern lands |
| 07 | להקה | Ensemble | Duo or larger, all styles incl. klezmer |
| 08 | מלחין / מנצח | Composer / Conductor | Classical, musical, opera, pop/rock (rotating) |
| 09 | נגן קלאסי | Classical Instrumentalist | (paired with category 10) |
| 10 | פרס חבר הנאמנים העולמי | World Trustees Council Prize | Second classical instrumentalist — designated international award |
| 11 | נגן פופולרי | Popular Instrumentalist / Producer | (paired with category 12) |
| 12 | פרס הקהל | People's Choice Award | Public-vote popular instrumentalist or producer |

**Total: 12 prizes.** Each category awards one inductee per cycle, selected by an independent panel of three judges, by unanimous decision.

---

## 3. PROCESS RULES (LOCKED)

These rules govern how the prize works. The site copy must reflect these without exception:

- **Three judges per category.** Composition of each panel is determined by the Prize management.
- **Unanimous decision required.** No prize is awarded if the panel cannot reach unanimity. In that case, management may dissolve the panel and appoint a replacement.
- **Each panel selects two names per category** — the winner and a runner-up.
- **Winner must attend the ceremony in person.** If a winner cannot attend for any reason, the prize transfers to the runner-up.
- **One-time award.** The Hall of Fame Awards Prize can be received only once per recipient.
- **Posthumous awards permitted in exceptional cases.**
- **Judges sign a conflict-of-interest declaration** as part of the regulations.
- **Judge identities remain confidential** until the official announcement.
- **Sessions are held January–March** of the year of the ceremony.
- **No protocol is recorded** — only the final unanimous decision.
- **All deliberations and shortlist names** (other than the winners) remain confidential indefinitely.
- **Two paths into the Hall of Fame each year:** (1) Winning the Prize at the ceremony, (2) Jury vote on deceased creators worthy of induction.
- **Exclusion clause** (per board decision, currently in drafting by R. Azulai): No prize will be awarded to any individual who speaks or acts against the State of Israel or the Jewish people.

---

## 4. COLOR TOKENS

Use these exact hex values. No substitutions. No gradients. No glow.

| Token | Hex | Use |
|---|---|---|
| `--stage` | `#121418` | Primary dark background — 80% of the site |
| `--stage-mid` | `#1C2030` | Secondary dark — alternates with stage |
| `--stage-lift` | `#252A3A` | Card backgrounds on dark |
| `--stage-deep` | `#0E0E0C` | Footer, deepest surface |
| `--paper` | `#F7F3EC` | Warm off-white — used only on Selection Process and Press Room pages |
| `--parchment` | `#EDE5D4` | Card backgrounds on paper |
| `--ember` | `#B0884A` | THE muted antique gold — borders, dividers, CTAs, labels, accents |
| `--ember-deep` | `#7A5A2B` | Hover state on ember |
| `--ceremonial-gold` | `#C8972A` | Slightly brighter gold — hero headline accent words ONLY, max 2% of viewport |
| `--ash` | `#8A857C` | Secondary text, metadata |
| `--ink` | `#0E0E0C` | Text on light backgrounds |
| `--line-dark` | `#2A2A28` | Hairline dividers on dark |
| `--line` | `#D8D0BF` | Hairline dividers on light |

**Rules:**
- Gold is FLAT. Never gradient. Never orange. Never yellow. If the gold is reading orange/amber, it's wrong — pull it cooler toward `#B0884A`.
- Maximum 4% gold coverage per viewport. Gold is precious — under-use, never overuse.
- No pure white text — always warm off-white `#F7F3EC`.
- No pure black backgrounds — always `--stage` `#121418`.

---

## 5. TYPOGRAPHY

**Hebrew:**
- Display / Headlines: **Frank Ruhl Libre**, Bold 700 / ExtraBold 800
- Body / UI: **Heebo**, Regular 400

**Latin (English):**
- Display / Headlines: **Fraunces**, Bold 700 / ExtraBold 800
- Body / UI: **Inter**, Regular 400

### Type Scale

| Token | Desktop | Mobile | Weight | Use |
|---|---|---|---|---|
| `display-xl` | 96px | 56px | Bold 700–800 | Hero headlines only |
| `display-lg` | 72px | 44px | Bold 700 | Section openers |
| `h1` | 56px | 36px | Bold 700 | Page titles |
| `h2` | 40px | 28px | Regular 400 | Major sections |
| `h3` | 28px | 22px | Medium 500 | Subsections |
| `h4` | 20px | 18px | Medium 500 | Card titles |
| `body-lg` | 20px | 18px | Regular 400 | Lead paragraphs |
| `body` | 16px | 16px | Regular 400 | Default |
| `caption` | 12px | 12px | Regular 400 / uppercase tracked | Labels, meta |

**Rules:**
- Body line-measure: max 60 characters
- Line-height: 1.5 body, 1.15 headlines
- Hero accent words: 1–2 words in `--ceremonial-gold`, the rest in warm off-white. Never full sentences in gold.
- Category numbers (01–12) stay in Latin numerals even in Hebrew layouts — international notation
- Countdown digits use tabular figures to prevent layout shift

---

## 6. LAYOUT

- 12-column grid, 24px gutters
- Section padding: 96–128px vertical on desktop, 56–80px mobile
- Sharp corners — **no border-radius anywhere**, ever
- 1px hairline dividers only — no thick borders, no shadows
- No card shadows
- No box-shadow on hover — use background lift or border reveal instead

---

## 7. NAVIGATION (every page)

- Sticky top bar: 64px tall on load → 48px on scroll
- Background: `--stage` with 80% opacity blur on scroll
- Wordmark: "טקס פרסי היכל התהילה | Jewish Music Hall of Fame Awards" — Frank Ruhl Libre / Fraunces, Medium weight
- Four nav links (one language at a time, controlled by switcher): אודות / About · קטגוריות / Categories · הטקס / Ceremony · תמיכה / Support
- Language switcher: `עברית · English` — current language underlined in `--ember`
- Active state on nav: 1px ember underline, 20px wide, centered below
- **NEVER mix languages in a single label** — no "בית HOME"

---

## 8. FOOTER (every page)

Background: `--stage-deep` `#0E0E0C` (slightly darker than stage).

Four columns:
- **Column 1 (35% width):** Wordmark · one-sentence mission · Petah Tikva, Israel · email
- **Column 2** "פרויקט / Project": About · Categories · Ceremony · Selection Process
- **Column 3** "חדשות / News": Latest News · Press Room · Newsletter
- **Column 4** "תמיכה / Support": Support Tiers · Contact · FAQ

Below columns: hairline divider in `--line-dark`. Then a row:
- Left: © 2027 Jewish Music Hall of Fame Awards
- Right: Privacy · Terms · Accessibility
- Center: small bridge link "Part of the Hall of Fame of Jewish Music project"

No social media feed embeds. No "made by" credits.

---

## 9. BUTTONS & CTAs

**Default style:** underline text-link with trailing arrow `→` (RTL: `←`), in `--ember`.

**Hero primary CTA only** (one per page maximum): filled `--ember` background, ink text, sharp corners, 48px tall, 24px horizontal padding. Hover → `--ember-deep`.

**Secondary CTA:** ghost — text only with underline, ash color.

**NEVER:**
- Pill buttons or rounded corners
- Gradient fills
- Shadow lifts
- Animated backgrounds on buttons

---

## 10. RTL HANDLING

- Hebrew layouts mirror entirely: text right-aligned, navigation order reversed
- Arrows flip: `→` becomes `←`
- Numbers stay LTR even in Hebrew (countdown digits, category numbers, prices)
- Latin punctuation rules apply within English content blocks

---

## 11. MOTION

- Default duration: 600–900ms (never under 300ms)
- Ease: `cubic-bezier(0.16, 1, 0.3, 1)`
- Cross-fade, don't slide
- Always respect `prefers-reduced-motion`
- Hero entrance: page loads black, image fades in, then headline words stagger upward
- Scroll reveals: fade + 12px upward drift, 800ms, staggered 60ms
- Card hover: background lift + border reveal, never shadow

---

## 12. PAGE-SPECIFIC ATMOSPHERE

| Page | Background | Mood |
|---|---|---|
| Home | Dark, cinematic | Anticipation, ceremony night |
| About | Dark with one paper section | Editorial, the mission |
| Categories Index | Dark | Taxonomic, editorial |
| Category Detail | Dark, cinematic | Drama for one award |
| Ceremony — Petah Tikva | Dark | The state ceremony, formal, Presidential |
| Ceremony — Los Angeles | Dark | The diaspora ceremony, parallel weight, awaiting details |
| Selection Process | **Paper** | Transparency, openness |
| Support / Donors | Dark | Inquiry, philanthropic weight |
| Legends | Dark, cinematic | Memorial, museum |
| Contact | Dark, three sections | Three audiences |
| Press Room | **Paper** | Openness for journalists |

The two paper-background pages (Selection Process, Press Room) are the institution's "transparency moments" — both serve audiences who must trust the institution. This contrast is intentional.

The two ceremony pages function as a pair: Petah Tikva is the primary state ceremony where the President of Israel presents the awards. Los Angeles is the companion ceremony bringing the moment to the largest Jewish diaspora community. Both feed the same Hall of Fame.

---

## 13. COMPONENT SPECIFICATIONS

### 13.1 Category Cards

Three sizes used in the categories index:

**Featured (Categories 01, 02, 03):** Full-width row, ~280px tall.
- Massive category number watermark behind name (display-xl, 15% opacity, light weight)
- Category name in `display-lg` Bold serif, off-white
- One-line description in `body-lg`, ash color
- Caption above name showing nominee count: "3 מועמדים · 3 NOMINEES" in uppercase tracked ember
- Right-aligned (RTL: left-aligned) `→ ראו מועמדים / See Nominees` link in ember
- Background `--stage-mid`

**Standard (Categories 04–09, 11):** 3-column tight grid.
- Category number in caption uppercase ember at top
- Name in `h4` serif Bold off-white
- One-line genre tag in caption ash
- Arrow in opposite corner
- Background `--stage-lift`
- Hover: 2px ember left/right border + lift to `--stage-mid`

**Special — Category 10 (פרס חבר הנאמנים העולמי / World Trustees Council Prize):** Standalone full-width row paired with Category 09 (the other classical instrumentalist).
- 2px gold left border (RTL: right border) always visible
- Small uppercase ember badge "פרס בינלאומי / INTERNATIONAL AWARD" in corner
- Background `--stage-mid`
- Differentiated treatment because it carries international diasporic recognition, not just Israeli

**Special — Category 12 (פרס הקהל / People's Choice Award):** Standalone full-width row below the grid, paired with Category 11.
- 2px gold left border (RTL: right border) always visible
- Small uppercase ember badge "פרס הקהל / PEOPLE'S CHOICE" in corner
- Background `--stage-mid`
- Differentiated treatment because it's audience-voted, not jury-decided
- This is the one category with a public voting mechanism — design must accommodate a vote button/widget when active

### 13.2 Inductee / Nominee Profile Card

- Portrait: B&W, square or 3:4 crop, fills card top
- Name: serif `h3`, off-white, immediately below image, no gap
- Dates: caption, ash
- Category labels: small uppercase tracked, ash, separated by `·`
- Hover: portrait fades to color over 600ms (color is the reward, not the default)

### 13.3 Donor Tier Block

NOT a pricing card. NOT side-by-side. Full-width editorial block, stacked vertically, ~400px tall each.

Three tiers:
- **חבר / Member ($1K)** — background `--stage`
- **שגריר / Ambassador ($10K)** — background `--stage-mid`, with small "הנפוץ ביותר / MOST POPULAR" uppercase ember label top-right, AND 2px ember left border (RTL: right border) full height
- **שותף מייסד / Founding Partner ($50K+)** — background `--stage`

Each block contains:
- Tier name in `display-lg` serif, off-white, left-aligned
- Gift amount in `display-lg` light-weight, gold, below name
- 2-line editorial description (60 words max) of what this partnership represents
- Benefits as inline comma-separated text — NOT a bullet list
- Single text-link CTA: "צרו קשר →" — no button background

Between blocks: 1px gold horizontal line.

### 13.4 Countdown Component

- Four units: ימים · שעות · דקות · שניות (DAYS · HOURS · MIN · SEC)
- Digits: `display-lg`, tabular figures, off-white, light weight
- Labels below digits: `caption`, uppercase, ash
- Separated by thin 1px vertical lines in `--line-dark`
- NOT colons between units
- Animation: digit flip (vertical), 300ms, only on changing digit
- Zero state: brief gold pulse, then "Ceremony is Tonight" message

### 13.5 Pull-Quote / Editorial Quote

- 2px left border in `--ember` (RTL: right border)
- Quote text: 32px, Frank Ruhl Libre / Fraunces, light weight
- Left-aligned (RTL: right-aligned) — NEVER centered
- Attribution below in caption ash
- No decorative ornaments — no dots, no flourishes, no quote marks

### 13.6 Forms

- Underline borders only (1px ash on bottom, no other borders)
- Floating labels (label moves up to caption size on focus)
- Submit button: text-link style with trailing arrow, NOT filled
- Field background: same as page background (transparent)
- Active state: bottom border becomes `--ember`

### 13.7 Feature List (used on Ceremony page)

- Each item: full-width row with thin bottom hairline divider
- NO bullet points, NO colored dots
- Optional: a 16px `--ember` ornamental icon on the leading edge (consistent style across all items)
- Item title: `h3` serif, off-white
- Item description: `body`, ash, on next line

### 13.8 Cross-Site Bridge Block

Used on Category Detail pages (post-announcement) and About page:
- Gold-bordered block (1px `--ember` border on all sides)
- Background `--stage-mid`
- Text: "Inducted into the Hall of Fame — [Year]" in serif `h3`
- Small caption above: "FROM THE PRIZE TO THE HALL / מהפרס להיכל"
- Links to the corresponding profile on the Building Site
- This is the visible bridge between the two sites — design it deliberately, not as an afterthought

---

## 14. ICONOGRAPHY

- **Categories use typographic numbers** (01, 02...) — NOT emoji, NOT illustrations
- Decorative icons (if any) are thin 1px line style, `--ember` color, 16–24px
- Hebrew letters (א, ב, ג, ד) may be used as numbering on the Selection Process page — culturally appropriate
- NEVER use emoji as primary iconography
- NEVER use stock icon libraries with rounded/filled style

---

## 15. PHOTOGRAPHY DIRECTION

- Hero: cinematic concert hall photography — empty stage with single spotlight, audience disappearing into darkness, dramatic lighting. NOT generic microphones, NOT crowds with phones.
- Inductee portraits: high-contrast B&W, formal portrait style, museum quality. Hover state reveals color subtly.
- Ceremony images: real event photography or licensed cinematic stock — never iStock generic
- The Selection Process and Press Room (paper background pages) use minimal photography — typography carries them

---

## 16. ANTI-PATTERNS — NEVER DO THESE

1. No mixed-language nav labels ("בית HOME" is broken UX)
2. No emoji as primary iconography
3. No SaaS-style pricing tables for donor tiers
4. No card shadows or border-radius
5. No gold gradients — flat color only
6. No pure white text on dark — always warm off-white
7. No pure black backgrounds — always `--stage` `#121418`
8. No centered body text on dark backgrounds
9. No filled button backgrounds (except single hero primary CTA per page)
10. No social media feed embeds
11. No stock photography clichés (microphones on stands, generic crowds)
12. No bullet points in feature lists — use hairline-divided rows
13. No countdown widgets from plugins — custom-coded for design integration
14. No "Donate Now" buttons — use "צרו קשר / Get in Touch" inquiry-first
15. No decorative ornaments below quote blocks (no dots, no flourishes)

---

## 17. RELATIONSHIP TO BUILDING SITE

The Prize Site (this one) and the Hall of Fame Building Site share:
- Same fonts (Frank Ruhl Libre / Heebo / Fraunces / Inter)
- Same spacing scale and grid
- Same `--ember` gold and base palette
- Same RTL handling
- Same accessibility standards

They differ:
- Prize uses BOLD weight on display type (ceremony drama). Building uses LIGHT weight (quiet authority).
- Prize is 80% dark backgrounds (always night in a ceremony hall). Building is 80% paper (archive, daylight).
- Prize allows `--ceremonial-gold` for hero accents. Building uses only `--ember`.

The bridge between them: Prize winners → "Inducted into the Hall of Fame" link → Building Site profile. Building Site profile → "First awarded at the [Year] Prize Ceremony" link → Prize Site category page.

---

*This document is the design source of truth. Every page generated should pass these rules without exception. When ambiguous, default to: editorial restraint, institutional weight, ceremonial gravity.*
