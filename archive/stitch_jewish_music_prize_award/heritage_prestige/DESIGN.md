---
name: Heritage Prestige
colors:
  surface: '#131313'
  surface-dim: '#131313'
  surface-bright: '#3a3939'
  surface-container-lowest: '#0e0e0e'
  surface-container-low: '#1c1b1b'
  surface-container: '#201f1f'
  surface-container-high: '#2a2a2a'
  surface-container-highest: '#353534'
  on-surface: '#e5e2e1'
  on-surface-variant: '#d2c4b4'
  inverse-surface: '#e5e2e1'
  inverse-on-surface: '#313030'
  outline: '#9b8f80'
  outline-variant: '#4f4539'
  surface-tint: '#edbf7b'
  primary: '#edbf7b'
  on-primary: '#442c00'
  primary-container: '#b28a4c'
  on-primary-container: '#3b2500'
  inverse-primary: '#7a581f'
  secondary: '#c6c6c6'
  on-secondary: '#2f3131'
  secondary-container: '#454747'
  on-secondary-container: '#b5b5b5'
  tertiary: '#c8c6c5'
  on-tertiary: '#313030'
  tertiary-container: '#929090'
  on-tertiary-container: '#2a2a2a'
  error: '#ffb4ab'
  on-error: '#690005'
  error-container: '#93000a'
  on-error-container: '#ffdad6'
  primary-fixed: '#ffddaf'
  primary-fixed-dim: '#edbf7b'
  on-primary-fixed: '#281800'
  on-primary-fixed-variant: '#604107'
  secondary-fixed: '#e2e2e2'
  secondary-fixed-dim: '#c6c6c6'
  on-secondary-fixed: '#1a1c1c'
  on-secondary-fixed-variant: '#454747'
  tertiary-fixed: '#e5e2e1'
  tertiary-fixed-dim: '#c8c6c5'
  on-tertiary-fixed: '#1c1b1b'
  on-tertiary-fixed-variant: '#474746'
  background: '#131313'
  on-background: '#e5e2e1'
  surface-variant: '#353534'
typography:
  headline-xl:
    fontFamily: Noto Serif
    fontSize: 48px
    fontWeight: '700'
    lineHeight: '1.1'
    letterSpacing: -0.02em
  headline-lg:
    fontFamily: Noto Serif
    fontSize: 32px
    fontWeight: '600'
    lineHeight: '1.2'
    letterSpacing: -0.01em
  headline-md:
    fontFamily: Noto Serif
    fontSize: 24px
    fontWeight: '500'
    lineHeight: '1.3'
    letterSpacing: '0'
  body-lg:
    fontFamily: Work Sans
    fontSize: 18px
    fontWeight: '400'
    lineHeight: '1.6'
    letterSpacing: '0'
  body-md:
    fontFamily: Work Sans
    fontSize: 16px
    fontWeight: '400'
    lineHeight: '1.6'
    letterSpacing: '0'
  label-md:
    fontFamily: Work Sans
    fontSize: 14px
    fontWeight: '600'
    lineHeight: '1.0'
    letterSpacing: 0.05em
spacing:
  unit: 8px
  gutter: 24px
  margin: 64px
  container-max: 1280px
---

## Brand & Style

The design system is anchored in the concepts of heritage, permanence, and quiet authority. It is designed for high-end editorial platforms, luxury archives, and institutions where prestige is paramount. The aesthetic merges **Minimalism** with **High-Contrast** elements to create a digital environment that feels like a physical ceremony.

The style is intentionally sparse but high-impact. It relies on a "Modern Classic" approach—stripping away unnecessary ornamentation to let the weight of the typography and the depth of the dark surfaces communicate value. Every interaction should feel intentional and deliberate, evoking a sense of exclusivity and timelessness.

## Colors

The palette is dominated by a deep, monochromatic foundation to ensure the antique gold remains the focal point of prestige.

- **Primary (#B0884A):** An antique, muted gold used for key call-to-actions, active states, and structural highlights. It is never used in excess, ensuring its appearance remains a mark of significance.
- **Surface Architecture:** The system uses a "True Black" (#050505) foundation. Layered surfaces use charcoal tones (#121212 and #1A1A1A) to create depth without relying on traditional drop shadows.
- **Typography Colors:** High-contrast off-whites (#E2E2E2) are used for readability, while muted grays provide hierarchy for secondary information.

## Typography

This design system utilizes a sophisticated typographic pairing to balance tradition with modern utility.

- **Headlines:** **Noto Serif** provides the authoritative, literary voice required for a prestige-focused theme. It is used for all major headers and editorial titles.
- **Interface & Body:** **Work Sans** is used for all functional elements and body text. Its grounded, professional character ensures that the UI remains legible and reliable.
- **Hierarchy:** Dramatic scale shifts between headlines and body text are encouraged to emphasize the editorial nature of the system. Uppercase labels with slight letter spacing are reserved for navigation and metadata to denote a curated feel.

## Layout & Spacing

The layout philosophy follows a **Fixed Grid** model to maintain a rigid, structured appearance reminiscent of premium print journals. 

- **Grid:** A 12-column grid system is used for desktop, with generous 64px margins that create a "frame" around the content.
- **Rhythm:** An 8px linear scale governs all padding and margin decisions. 
- **Density:** The system favors "Low Density" layouts. Large amounts of negative space are used to draw attention to the antique gold accents and high-quality imagery, reinforcing the sense of luxury and breathing room.

## Elevation & Depth

In this design system, depth is achieved through **Tonal Layers** and **Low-Contrast Outlines** rather than traditional shadows.

1.  **Level 0 (Base):** The deepest layer, using the neutral background color (#050505).
2.  **Level 1 (Surfaces):** Cards and containers use a slightly lighter shade (#121212) to distinguish themselves from the background.
3.  **Accents:** Interactive elements use a 1px solid border in the antique gold (#B0884A) or a subtle semi-transparent gold tint to indicate elevation.
4.  **Shadows:** When strictly necessary, use highly diffused, low-opacity black shadows (0% - 15% opacity) to provide a soft lift that doesn't break the high-contrast aesthetic.

## Shapes

The shape language is strictly **Sharp (0px)**. 

To evoke a sense of heritage and structural integrity, every UI element—including buttons, input fields, and cards—features hard 90-degree corners. This decision avoids the "friendliness" of rounded corners in favor of a more serious, architectural, and prestigious aesthetic. This sharpness should be mirrored in the iconography, which should use thin, consistent strokes and sharp joins.

## Components

### Buttons
- **Primary:** Solid #B0884A background with #050505 text. Sharp corners.
- **Secondary:** Ghost style. 1px border of #B0884A with gold text.
- **Interaction:** On hover, primary buttons darken slightly; secondary buttons fill with a low-opacity gold wash.

### Cards
- **Construction:** Background of #121212. No shadows.
- **Border:** A 1px border in #1A1A1A (or #B0884A for featured content).
- **Typography:** Headlines within cards should always use Noto Serif.

### Input Fields
- **Styling:** Underline-only or 1px border in #1A1A1A. 
- **Focus State:** The border color shifts to #B0884A with no glow or outer shadow.
- **Labels:** Use Work Sans in uppercase, 12px or 14px, for a professional, form-like appearance.

### Lists & Navigation
- **Dividers:** Horizontal rules should be thin (1px) and use #1A1A1A.
- **Active State:** Indicated by a vertical gold line (2px) to the left of the list item or a change in text color to #B0884A.

### Additional Elements
- **Selection:** Use a muted gold highlight for text selection.
- **Loading States:** Use a minimal, linear progress bar in #B0884A rather than a circular spinner.