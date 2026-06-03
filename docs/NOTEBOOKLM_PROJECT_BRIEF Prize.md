# Jewish Music Hall of Fame Awards — Complete Project Brief
*For NotebookLM Memory System*

## Project Overview

**Project:** Website design and development for the Jewish Music Hall of Fame Awards (טקס פרסי היכל התהילה של המוזיקה היהודית)
**Client:** Yoav Sharig, Project Manager
**Status:** Theme development complete, waiting for PHP upgrade to deploy to staging
**Timeline:** December 28, 2027 inaugural ceremony
**Current Phase:** Week 1 of 6-week development plan

## What We've Built

### 1. Complete Design System (DESIGN.md - 400 lines)
- **Color palette:** Dark-first institutional design with muted gold accents
- **Typography:** Hebrew (Frank Ruhl Libre + Heebo) and English (Fraunces + Inter)
- **Layout:** 12-column grid, 96-128px section padding, sharp corners (no border-radius)
- **Motion:** 600-900ms duration, respects reduced-motion preferences
- **Components:** 8 custom blocks (countdown, category cards, donor tiers, etc.)

### 2. Full Site Architecture (11 page templates designed in Stitch)
- **Home page:** Cinematic hero with countdown timer
- **Categories index:** 12 award categories with asymmetric editorial layout
- **Category detail pages:** Pre/post-announcement states with inductee profiles
- **Legends page:** Memorial-style posthumous inductees
- **Ceremony page:** Dual ceremony structure (Petah Tikva + Los Angeles)
- **Selection Process:** Transparency page on cream background
- **Support/Donors:** Three-tier philanthropic approach
- **Press Room, Contact, About:** Standard institutional pages

### 3. WordPress Theme (jmhof-2027.zip - 25 files, 40KB)
**Delivered by Cowork developer, ready for staging deployment**
- Custom FSE block theme (no page builders)
- Full Hebrew RTL + English LTR multilingual support
- ACF integration for content management
- Rights-clearance system for photos/videos
- Performance optimized (target: LCP <2.0s, CLS <0.05)

## Current Technical Status

### Infrastructure
- **Domain:** hallofame.org (live but with end-of-life PHP 7.4.33)
- **Hosting:** Shared LiteSpeed hosting (likely Hostinger/NameCheap/A2)
- **Immediate blocker:** PHP upgrade to 8.2 required before theme deployment
- **Backup:** UpdraftPlus running autonomously on server

### Active Plugins (need cleanup)
- **Keep:** LiteSpeed Cache, Duplicate Page, Query Monitor, UpdraftPlus
- **Remove:** Elementor stack (incompatible with new theme)
- **Add:** Polylang, ACF, Fluent Forms, Yoast SEO

## Key Decisions and Context

### From Board Meetings (April 2026)
- **Two separate sites confirmed:** Prize site (this project) + Hall of Fame Building site (separate)
- **Ceremony details locked:** December 28, 2027, Petah Tikva Cultural Center, President of Israel presenting
- **12 official categories defined** (Categories 10 & 12 are special: World Trustees Council Prize + People's Choice)
- **Rights clearance mandatory:** All artist photos and promotional video must be cleared before publication
- **Exclusion clause:** No prize for anyone speaking/acting against Israel or Jewish people
- **Los Angeles companion ceremony:** Being planned in parallel, details TBD

### Content Strategy
- **Professional copywriter:** Roei Azulai writing all final copy in Hebrew + English
- **Stitch placeholder content:** Ignore completely — just structural reference
- **Content gating:** `is_rights_cleared` flags control photo/video publication
- **Cross-site bridge:** Links between Prize site and future Building site

## Design Philosophy and Brand

**Tone:** Institutional × Ceremonial × Editorial
**Reference point:** Grammy Awards × Nobel Prize × Yad Vashem
**Not:** Festival, SaaS, nonprofit donation page, music streaming app

**Core principle:** "The night Jewish music takes its rightful place in history"
**Fundraising tagline:** "הצליל של עמנו / The Sound of Our People"

**Visual hierarchy:**
- Prize site: Bold/heavy typography (ceremony drama), 80% dark backgrounds
- Building site (future): Light/refined typography (quiet authority), 80% light backgrounds
- Same fonts, same tokens, different personality

## The 12 Official Categories (2027 Cycle)

| # | Hebrew | English | Notes |
|---|---|---|---|
| 01 | זמר | Male Vocalist | All languages/styles |
| 02 | זמרת | Female Vocalist | All languages/styles |
| 03 | חזן / פייטן | Cantor / Paytan | Ashkenazi or Mizrahi |
| 04 | זמר ישראלי | Israeli Male Vocalist | Hebrew, pop, rock |
| 05 | זמרת ישראלית | Israeli Female Vocalist | Hebrew, pop, rock |
| 06 | זמר/ת ים-תיכוני | Mediterranean Vocalist | Israel + Eastern lands |
| 07 | להקה | Ensemble | Duo+, all styles incl. klezmer |
| 08 | מלחין / מנצח | Composer / Conductor | Classical, musical, opera, pop/rock |
| 09 | נגן קלאסי | Classical Instrumentalist | (paired with 10) |
| 10 | פרס חבר הנאמנים העולמי | World Trustees Council Prize | International classical instrumentalist |
| 11 | נגן פופולרי | Popular Instrumentalist / Producer | (paired with 12) |
| 12 | פרס הקהל | People's Choice Award | Public-vote popular instrumentalist/producer |

## Process Rules (Locked)
- 3 judges per category, unanimous decision required
- Winner must attend ceremony in person (runner-up substitutes if not)
- One-time award per recipient
- Judge identities confidential until announcement
- Sessions January-March 2027
- Two paths into Hall of Fame: (1) Win prize, (2) Jury vote on deceased creators

## Development Workflow

### Week 1 Status (Current)
✅ **Theme scaffold complete** (jmhof-2027.zip ready)
✅ **Design system implemented** (all CSS tokens, typography, components)
✅ **Backup created** (UpdraftPlus running)
⏳ **PHP upgrade pending** (7.4.33 → 8.2, server team handling)
⏳ **Staging deployment** (waiting for PHP upgrade)

### 6-Week Plan
1. **Week 1:** Foundation (nav, footer, global styles) → staging review
2. **Week 2:** Home + About + Categories index
3. **Week 3:** Category detail + Legends + Ceremony (dual-city structure)
4. **Week 4:** Selection Process + Support + Press + Contact
5. **Week 5:** SEO + performance + accessibility audit
6. **Week 6:** Content integration (Roei's copy) + launch readiness

## Files and Assets

### Design Documentation
- **DESIGN.md** (400 lines) — Complete design system tokens and rules
- **COWORK_PROMPT.md** (419 lines) — Developer brief with full technical specs
- **prize_site_design_brief.md** (654 lines) — Original comprehensive brief

### Theme Files
- **jmhof-2027.zip** — Complete WordPress theme (25 files, 40KB)
- All page templates, CSS assets, JavaScript, ACF field definitions
- Rights-clearance logic, multilingual support, performance optimization

### Stitch Designs (Reference Only)
- Home page (locked)
- Categories index (locked)
- Category detail template (locked)
- Selection Process (locked)
- Legends page (locked)
- 6 additional page templates generated

## Key Contacts and Roles

- **Yoav Sharig:** Project manager, final decisions
- **Roei Azulai:** Professional copywriter (Hebrew + English)
- **Cowork:** Developer (theme completed, waiting for deployment)
- **Server team:** Handles PHP upgrade (gating deployment)
- **Carolin Schwab:** Director International Relations (rights clearance templates)

## Critical Operational Issues

### Rights Clearance (Board Decision April 13, 2026)
- All artist photos must come down until signed rights obtained
- Promotional video (Yosef Kobzon segment) being replaced with Tamara Gverdtsiteli
- Site gated as "marketing preview" until cleanup complete
- `is_rights_cleared` boolean controls photo/video publication

### Technical Dependencies
1. **PHP 8.2 upgrade** (immediate blocker)
2. **Plugin licensing** (WPML Pro, ACF Pro, Gravity Forms — ~$300/year)
3. **Staging environment** creation
4. **Cross-site architecture** planning (Prize ↔ Building bridge)

## Success Metrics

### Technical
- Core Web Vitals green on 75th percentile mobile
- WCAG 2.1 AA accessibility compliance
- Hebrew RTL and English LTR at parity
- Countdown timer accuracy (to December 28, 2027)

### Business
- Donor inquiry conversion via support page
- Newsletter signup rates
- Cross-site traffic to Building site (when live)
- Category engagement (tracking which awards generate most interest)

## Anti-Patterns (Never Do)

1. Mixed-language navigation ("בית HOME")
2. Emoji as primary iconography
3. SaaS-style pricing tables for donor tiers
4. Border-radius or box-shadows anywhere
5. Gold gradients (flat color only)
6. Pure white text (warm off-white #F7F3EC)
7. Elementor or page builder compatibility
8. Stock photography clichés (microphones on stands)
9. Bullet points in feature lists
10. Cookie consent popups (using Plausible Analytics)

## Next Session Priorities

1. **Confirm PHP upgrade status** with server team
2. **Deploy theme to staging** and review foundation
3. **Plan Building site architecture** (separate project)
4. **Content strategy session** with Roei
5. **Rights clearance workflow** implementation

---

*This brief serves as complete project memory. All design decisions, technical specifications, content strategy, and development workflow are documented above. Future sessions should reference this brief for context and continuity.*
