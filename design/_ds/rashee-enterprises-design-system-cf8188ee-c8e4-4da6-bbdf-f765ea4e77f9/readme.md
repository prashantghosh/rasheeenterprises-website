# Rashee Enterprises — Design System

A brand + UI design system for **Rashee Enterprises**, a manufacturing and trading
company specialising in B2B and online sales. Slogan: *"Empowering Your Business,
One Solution at a Time."*

> The compiler bundles the components into `_ds_bundle.js` and indexes tokens/fonts.
> In `@dsCard` HTML, read components via
> `const { Button, Card, … } = window.RasheeEnterprisesDesignSystem_cf8188`.

## Sources

Everything here is derived from the material the user provided — no invented brand facts:

- **`uploads/Rashee Enterprises Brand Guidelines - uBrand.pdf`** — 10-page brand book
  (logos, icon, colours, fonts, about/mission/vision/values, slogan & tone). Page
  renders saved under `scraps/pageNN.png`.
- **uBrand brand hub** (view-only, may require the owner's login):
  - DNA: https://ubrand.com/TMfGj03aNC/dna
  - Assets: https://ubrand.com/TMfGj03aNC/assets
  - The client also supplied the **full official logo variant set** (13 PNGs:
    colour, white, inverted, mono, grayscale — lockup, symbol and square each) now
    in `assets/logos/`. No vector (SVG) artwork was provided.

There is **no product codebase or Figma file** — the guidelines are the only ground
truth, so the UI kits below are plausible, on-brand recreations of the surfaces a B2B
manufacturer/trader would run (marketing site + partner portal), not copies of a
shipped product.

---

## Brand context

- **What they do:** manufacturing + trading; B2B and online sales.
- **Mission:** provide top-notch manufacturing and trading solutions that empower
  businesses worldwide.
- **Vision:** be a recognised leader in B2B and online sales solutions, fostering
  growth and success for partners.
- **Values:** Integrity · Reliability · Innovation.
- **Tone:** Professional · Engaging · Trustworthy.

---

## CONTENT FUNDAMENTALS — how Rashee writes

- **Voice:** professional and confident, warm but never casual. Corporate B2B, aimed
  at procurement teams and business partners.
- **Person:** speaks as **"we"** ("Our commitment is…", "we strive to be a leader"),
  addresses the reader as **"you"/"your business"**. Collective + direct.
- **Casing:** Title Case or sentence case for UI; **UPPERCASE (Oswald, wide-tracked)**
  for eyebrows and small labels. The wordmark is uppercase ("RASHEE ENTERPRISES").
- **Sentences:** complete, declarative, benefit-led. Pairs a capability with an
  outcome ("deliver quality products and services that exceed customer expectations").
- **Emoji:** none. This is a corporate brand — never use emoji.
- **Vibe words:** empower, quality, dynamic, innovative, superior, leader, trust,
  partners, solutions.
- **Examples from the brand:**
  - Slogan — "Empowering Your Business, One Solution at a Time."
  - About — "Rashee Enterprises stands at the forefront of manufacturing and trading…
    empowering businesses through superior solutions."
  - CTA style used in kits — "Request a quote", "Talk to sales", "Explore products".
- **Do:** lead with the customer benefit, keep claims concrete, stay calm and assured.
- **Don't:** slang, hype punctuation (!!), jokey copy, first-person singular ("I").

---

## VISUAL FOUNDATIONS

- **Colour:** anchored on **Picton Blue `#41A9DC`** (primary) with a **brand gold**
  pair (`#F3D170` light → `#A77D31` deep) taken from the two halves of the logo.
  Neutrals are a **cool, subtly blue-tinted slate** — never pure grey. White is the
  dominant surface. Max one or two brand colours per composition; gold is an accent
  only (CTAs, "Featured"), not a workhorse. Semantic status greens/ambers/reds are
  provided for UI but sit outside the brand palette.
- **Signature gradient:** the logo's continuous **gold → blue sweep**
  (`--rs-gradient-brand`) plus a simpler `--rs-gradient-blue` for buttons/CTA bands and
  image tints.
- **Type:** **Oswald** (condensed display) for headlines, section titles, stats and
  uppercase eyebrows; **Roboto Flex** for body, UI and labels. Headlines set tight
  (line-height ~1.05, slight negative tracking); body relaxed (1.5–1.65). Eyebrows are
  uppercase Oswald with `.14em` tracking.
- **Backgrounds:** predominantly clean white and a pale slate `--surface-subtle` for
  alternating sections. Full-bleed **cool-toned architecture photography** (glass
  towers, low-angle, blue-grey sky) for hero/feature imagery; overlay a bottom slate
  gradient when white text sits on a photo. No busy patterns, no noise/grain.
- **Imagery colour vibe:** cool, corporate, blue-leaning; calm and aspirational.
- **Corner radii:** soft and friendly, echoing the rounded logo tiles — cards
  `--radius-lg (14px)`, buttons/inputs `--radius-md (10px)`, pills for badges/tags.
- **Cards:** white surface, 1px subtle slate border, soft **cool-tinted shadow**
  (`--shadow-sm/md`); optional brand-gradient accent bar on featured cards; lift +
  deeper shadow on hover for interactive cards.
- **Shadows:** slate-tinted (`rgba(26,34,43,…)`), never neutral black; a blue-tinted
  `--shadow-brand` for primary buttons.
- **Borders:** hairline 1px slate (`--border-subtle/-default`); 2px focus ring in blue
  (`--ring-focus`).
- **Motion:** quick and professional — 120–320ms, `cubic-bezier(.4,0,.2,1)`. Fades and
  small translate/scale pops (dialogs, toasts). **No bounce, no playful easing.**
- **Hover states:** buttons darken (primary → blue-600/700, gold → gold-700/900);
  ghost/outline pick up a subtle tinted fill; cards lift 2px. **Press:** darker still +
  1px downward nudge (no shrink).
- **Transparency/blur:** used sparingly — sticky header uses a translucent white with
  `backdrop-filter: blur`; dialog scrim is slate at ~52% with a light blur.
- **Layout:** 1200px max content width, 32px gutters; generous vertical rhythm on the
  4px spacing scale; sticky top nav; fixed sidebar in the portal.

---

## ICONOGRAPHY

- The brand book ships **no icon library** of its own (only the RS logo mark and a few
  decorative emoji-style glyphs on the mission/vision page). So the system standardises
  on **[Lucide](https://lucide.dev)** — clean 2px-stroke line icons that match the
  brand's professional, modern feel. **This is a substitution; flag it to the user** if
  a specific icon set is required.
- **Delivery:** Lucide via CDN (`<script src="https://unpkg.com/lucide@latest"></script>`),
  wrapped by the **`Icon`** component (`<Icon name="package" size={20} />`). Stroke
  width 2, inherits `currentColor`.
- **No emoji** in product UI or marketing. No PNG icon sprites. Unicode glyphs are not
  used as icons.
- **Logo/mark** lives in `assets/` as PNG (see below) and is exposed through the
  **`Logo`** component — never redraw the mark.

### Brand assets (`assets/`)

Official brand logo set (supplied by the client) lives in `assets/logos/`:
- `logo.png` / `symbol.png` — primary full-colour lockup + RS mark, **transparent** bg.
- `main-logo.png` / `main-symbol.png` / `main-square.png` — colour on white.
- `white-logo.png` / `white-symbol.png` — solid white on transparent (dark surfaces; derived from the transparent art).
- `inverted-logo.png` / `inverted-symbol.png` / `inverted-square.png` — white mark on a Picton-Blue tile.
- `mono-logo.png` / `mono-symbol.png` / `mono-square.png` — single-colour flat blue.
- `grayscale-logo.png` — tonal greyscale. `origin-logo.png` — original master.
- The `Logo` component maps `tone` (`color`/`white`/`inverted`/`mono`/`grayscale`) to these files.
- `imagery/tower-portrait.jpg`, `tower-a.jpg`, `tower-b.jpg`, `tower-c.jpg` — cool-toned
  architecture photos cropped from the guidelines (brand imagery style reference).
- `fonts/` — self-hosted Oswald + Roboto Flex woff2 (latin, weights 400–700).

**Logo note:** the client supplied the full official logo variant set as **raster PNGs**
(no SVG). The `white-*` files were recoloured from the real transparent art. Ask the
user for vector (SVG) artwork for print/large-scale use.

---

## Components

Reusable primitives (in `components/<group>/`). This is a brand-guidelines-only system
with no source component inventory, so a **standard B2B UI set** was authored, plus two
**intentional additions** (`Logo`, `Icon`) needed to use the brand mark and icon set.

**brand/** — `Logo`, `Icon`
**core/** — `Button`, `IconButton`
**forms/** — `Input`, `Select`, `Checkbox`, `RadioGroup`, `Switch`
**data/** — `Card` (+ `Card.Header/Body/Footer`), `Badge`, `Tag`
**navigation/** — `Tabs`
**feedback/** — `Dialog`, `Toast`, `Tooltip`

Each directory has a `<Name>.jsx`, `<Name>.d.ts`, `<Name>.prompt.md`, and a
`@dsCard`-tagged `*.card.html` preview.

## UI kits

- **`ui_kits/website/`** — marketing site. Interactive Home (hero, values, featured
  products, about, CTA), Products catalog (live category filter, search, sort,
  add-to-quote dialog + toast), Solutions, and Contact form. Files: `index.html`,
  `Chrome.jsx` (header/footer), `HomePage.jsx`, `ProductsPage.jsx`.
- **`ui_kits/portal/`** — B2B partner portal. Sidebar app with a Dashboard (stat cards,
  recent-orders table, activity feed) and an Orders screen (tabbed status filter,
  data table). Files: `index.html`, `Portal.jsx`.

## Foundations (Design System tab)

Specimen cards live in `guidelines/` (Colors, Type, Spacing, Brand groups) — primary
blue, gold, neutrals, semantic, gradient; display/body/eyebrow type; spacing, radius,
shadow scales; logo lockups, voice/slogan, imagery.

---

## Root manifest

- `styles.css` — global entry (only `@import`s the token + font layers).
- `tokens/` — `fonts.css`, `colors.css`, `typography.css`, `spacing.css`, `effects.css`.
- `assets/` — logos, imagery, fonts.
- `components/` — brand · core · forms · data · navigation · feedback.
- `ui_kits/` — website · portal.
- `guidelines/` — foundation specimen cards.
- `thumbnail.html` — homepage tile. `SKILL.md` — Agent-Skill wrapper. `readme.md` — this file.
