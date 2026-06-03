---
name: Ceremonial Minimalist
colors:
  surface: '#16130e'
  surface-dim: '#16130e'
  surface-bright: '#3d3833'
  surface-container-lowest: '#110e09'
  surface-container-low: '#1f1b16'
  surface-container: '#231f1a'
  surface-container-high: '#2e2924'
  surface-container-highest: '#39342f'
  on-surface: '#eae1d9'
  on-surface-variant: '#d2c4b4'
  inverse-surface: '#eae1d9'
  inverse-on-surface: '#34302a'
  outline: '#9b8f80'
  outline-variant: '#4f4539'
  surface-tint: '#edbf7b'
  primary: '#edbf7b'
  on-primary: '#442c00'
  primary-container: '#b28a4c'
  on-primary-container: '#3b2500'
  inverse-primary: '#7a581f'
  secondary: '#f4be4f'
  on-secondary: '#412d00'
  secondary-container: '#b8891b'
  on-secondary-container: '#382700'
  tertiary: '#a9c9f5'
  on-tertiary: '#0c3255'
  tertiary-container: '#7493bc'
  on-tertiary-container: '#022b4e'
  error: '#ffb4ab'
  on-error: '#690005'
  error-container: '#93000a'
  on-error-container: '#ffdad6'
  primary-fixed: '#ffddaf'
  primary-fixed-dim: '#edbf7b'
  on-primary-fixed: '#281800'
  on-primary-fixed-variant: '#604107'
  secondary-fixed: '#ffdea4'
  secondary-fixed-dim: '#f4be4f'
  on-secondary-fixed: '#261900'
  on-secondary-fixed-variant: '#5d4200'
  tertiary-fixed: '#d2e4ff'
  tertiary-fixed-dim: '#a9c9f5'
  on-tertiary-fixed: '#001c37'
  on-tertiary-fixed-variant: '#28486d'
  background: '#16130e'
  on-background: '#eae1d9'
  surface-variant: '#39342f'
typography:
  display-xl:
    fontFamily: Frank Ruhl Libre
    fontSize: 72px
    fontWeight: '700'
    lineHeight: '1.1'
    letterSpacing: -0.02em
  headline-lg:
    fontFamily: Frank Ruhl Libre
    fontSize: 48px
    fontWeight: '500'
    lineHeight: '1.2'
  headline-md:
    fontFamily: Frank Ruhl Libre
    fontSize: 32px
    fontWeight: '500'
    lineHeight: '1.3'
  body-lg:
    fontFamily: Fraunces
    fontSize: 20px
    fontWeight: '400'
    lineHeight: '1.6'
  body-md:
    fontFamily: Fraunces
    fontSize: 16px
    fontWeight: '400'
    lineHeight: '1.6'
  label-caps:
    fontFamily: Fraunces
    fontSize: 12px
    fontWeight: '700'
    lineHeight: '1.0'
    letterSpacing: 0.15em
spacing:
  unit: 4px
  gutter: 24px
  margin: 48px
  container-max: 1280px
  hairline: 1px
---

## Brand & Style

The design system is anchored in a ceremonial, archival aesthetic that evokes a sense of timeless authority and prestige. It is designed for high-end editorial platforms, institutional archives, or luxury marketplaces where the content must feel curated and immutable. 

The style is a fusion of **Minimalism** and **Modern Brutalism**. It rejects the softness of modern consumer web design—eschewing rounded corners, shadows, and gradients—in favor of a structural, grid-heavy layout defined by razor-sharp 90-degree angles and thin 1px hairline dividers. The emotional response is one of solemnity, stability, and high-value exclusivity.

## Colors

The palette utilizes a "Muted Antique Gold" as the primary anchor, applied as a flat pigment without metallic simulation. The primary accent (#B0884A) is reserved for interactive elements and brand marks, while the secondary accent (#C8972A) is strictly for hero moments and high-impact headlines to provide a subtle lift in vibrance.

The background system uses a three-tier dark mode architecture. The deepest shade (#121418) serves as the canvas, while the lighter tones (#1C2030 and #252A3A) are used for structural containment and logical grouping. Contrast is maintained through high-value off-whites and desaturated blues to ensure the gold accents remain the focal point of the visual hierarchy.

## Typography

This design system employs a dual-serif approach to reinforce its archival nature. **Frank Ruhl Libre** is used for headlines; its sharp, high-contrast strokes provide the "ceremonial" weight required for structural headers. **Fraunces** is used for body copy and labels, offering a more contemporary and legible serif experience that softens the rigor of the layout just enough to maintain readability.

Text should be set with generous line heights to prevent the dense serif letterforms from feeling cluttered. All navigational labels and small metadata should be set in Fraunces All-Caps with expanded letter spacing to act as a secondary structural element.

## Layout & Spacing

The layout is built on a **fixed 12-column grid** that aligns strictly with the container. Horizontal and vertical 1px hairline dividers are the primary method of separating content, replacing the need for white space in many instances. 

A rigid 8px stepping scale governs all margins and padding. Symmetry is a core requirement; elements should be balanced across the vertical axis whenever possible to maintain the formal, ceremonial feel. Hero sections should utilize the full container width, bounded by hairline borders to create a "framed" effect similar to a plaque or a traditional certificate.

## Elevation & Depth

In this design system, depth is achieved exclusively through **Tonal Layering**. There are no shadows or blurs. 

Objects "rise" in the hierarchy by moving from the base background (#121418) to the surface color (#1C2030), and finally to the elevated surface (#252A3A). These layers must be separated by 1px hairline strokes in a slightly lighter or darker tint than the surface they sit on to maintain the flat, architectural appearance. The result is a UI that feels like it is composed of stacked, precision-cut plates rather than floating elements.

## Shapes

The shape language is strictly **Sharp**. Every corner in the design system is a perfect 90-degree angle. This lack of curvature emphasizes the "ceremonial" and "fixed" nature of the product, conveying discipline and permanence. Any graphical ornaments or iconography used must follow this geometric rigor, avoiding organic curves in favor of linear, angular construction.

## Components

### Buttons
Buttons are rectangular with 0px radius. The primary action is a solid fill of #B0884A with black text. Secondary actions are "Ghost" style: 1px hairline border in #B0884A with no fill. Hover states should simply swap the fill and border colors—never use gradients or shadows.

### Dividers
The 1px hairline is the most critical component. It should be used to separate list items, header sections, and grid columns. The color of the hairline should be #B0884A at 30% opacity for subtle separation, or 100% opacity for major section breaks.

### Input Fields
Inputs consist of a 1px bottom-border only, or a full 1px box frame. Labels sit above the input in the "label-caps" typography style. Focus states are indicated by the border color changing to the secondary accent (#C8972A).

### Cards & Containers
Cards do not have shadows or rounded corners. They are defined by a background color change (#1C2030) and a 1px border. In the hero section, cards may use the secondary accent for their borders to denote importance.

### Lists
Lists are separated by horizontal 1px lines extending to the edges of the container. Each item should have a generous vertical padding (24px - 32px) to maintain the editorial feel.