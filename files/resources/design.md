# Anvil — design system

## Atmosphere

Brutalist editorial, sold like a tool catalogue rather than a platform. A warm
gray canvas that is never white, white surfaces laid on it, and full-bleed
black blocks that interrupt the page rather than decorate it. Nothing casts a
shadow and nothing glows; depth comes from surface tone alone. All of the
emotion is carried by the type — condensed uppercase display at 0.9 leading
towering over calm 17px body copy.

The product is enterprise software that performs back-office work inside
systems of record. The design should feel accountable: legible, unhurried,
slightly heavy, closer to a well-set annual report than to a SaaS landing page.

## Colors

| Token | Value | Role |
|---|---|---|
| `--color-canvas` | `#e5e5e5` | The page. Warm gray, never white. |
| `--color-surface` | `#ffffff` | Cards and blocks laid on the canvas. |
| `--color-mist` | `#f3f3f3` | The quiet band — questions, departments. |
| `--color-block` | `#000000` | Full-bleed dark sections and the footer. |
| `--color-graphite` | `#2f2f2f` | A surface inside a black block. |
| `--color-ink` | `#000000` | Primary text and filled buttons. |
| `--color-muted` | `#444444` | Body copy on light grounds (7.7:1 on canvas). |
| `--color-faint` | `#5f5f5f` | Monospace meta on light grounds (5.1:1). |
| `--color-invert` | `#ffffff` | Text on black. |
| `--color-smoke` | `#979797` | Secondary text **on black only** (7.2:1). |
| `--color-line` | `#c6c6c6` | Hairlines on light. |
| `--color-line-invert` | `white/16%` | Hairlines on black. |
| `--color-mint` | `#d1ffca` | Tags, marks, one card tone. |
| `--color-volt` | `#fff100` | The closing panel, the mail link, the ledger stamp. |

Rules: mint and volt are rationed. Volt owns exactly one surface on the page —
the right half of the closing panel — plus the stamp and the mail address.
Never tint body text with either; both carry black text when used as a ground.
`--color-smoke` on the canvas measures 2.6:1 and must never appear there.

The primary action is a black button with white text. There is no coloured CTA.

## Typography

- **Display** — Anton 400, uppercase always, `line-height: 0.9`,
  `letter-spacing: -0.03em`. Four sizes: `.display-hero`
  (clamp 3.25→7.5rem), `.display-page` (2.75→5rem), `.display-section`
  (2.25→4rem), `.display-block` (1.75→2.25rem).
- **Text** — Inter 400/500/600. Body `1.0625rem/1.65`; paragraphs cap at
  52–60 characters. `.heading-alt` is the secondary heading voice: Inter 500,
  uppercase, `-0.02em`.
- **Mono** — JetBrains Mono 400 at `0.75rem`, uppercase, `+0.06em`, as
  `.mono-label`. It carries data only: a system name, a date, a rail position,
  a clock, an address. It is never an eyebrow above a heading.

## Spacing and radius

Sections are `py-20 sm:py-28 lg:py-32` with `px-6 sm:px-8`, inside a
`max-w-[88rem]` container. Every multi-column layout uses `gap-6`.

Radii are deliberately split: 8px on buttons, 24px on cards, 32px on large
cards and panels, 40–64px on the shoulders where a black or white block meets
the canvas, and fully round on the nav pill and tags. Nothing else is rounded.

## Components

- **Header** — mark and wordmark left, a white pill of links at the true centre
  of the page, one small black button right. The pill is the only fully-round
  shape in the chrome.
- **Buttons** — `.btn-filled` (black, white text) and `.btn-outline` (hairline).
  Inside `.on-block` both invert. `.btn-sm` is the header size.
- **Cards** — flat, no border, no shadow; separation comes from the tone
  underneath. A run card's head is mist, or mint when `data-tone="mint"`.
- **Rows** — departments, questions and posts are hairline rows rather than
  cards. Use the lightest separation that works.
- **The ledger** — the signature. A black band with queued work on the left and
  cleared work on the right; rows are struck through and stamped one at a time.
- **Split close** — a full-bleed row cut in half, black against volt, each half
  a whole link.

## Voice

Declarative, short, specific, unexcited. Numbers instead of adjectives. Say
what the software does and what it refuses to do. "It logs in, does the work,
and shows you what it changed."

Never: powerful, seamless, all-in-one, revolutionise, unlock, supercharge.
Headings take a full stop when they are sentences, and the page is consistent
about it.

## Anti-patterns

- Pure white as the page background. The canvas is `#e5e5e5`.
- `--color-smoke` on a light ground.
- A shadow, a gradient, or a glow anywhere.
- A monospace eyebrow above a heading. Mono carries data, not decoration.
- Mint or volt as a large fill on the canvas, or as a text colour.
- More than one filled button in a viewport.
- Six sections of the same shape. The page alternates canvas, black, white,
  mist and full-bleed on purpose.

## Tokens

```css
@theme {
    --color-canvas: #e5e5e5;
    --color-surface: #ffffff;
    --color-mist: #f3f3f3;
    --color-block: #000000;
    --color-graphite: #2f2f2f;

    --color-ink: #000000;
    --color-muted: #444444;
    --color-faint: #5f5f5f;
    --color-invert: #ffffff;
    --color-smoke: #979797;

    --color-line: #c6c6c6;
    --color-line-invert: rgb(255 255 255 / 0.16);

    --color-mint: #d1ffca;
    --color-volt: #fff100;
    --color-accent-ink: #000000;

    --font-display: "Anton", "Arial Narrow", ui-sans-serif, system-ui, sans-serif;
    --font-sans: "Inter", ui-sans-serif, system-ui, -apple-system, sans-serif;
    --font-mono: "JetBrains Mono", ui-monospace, SFMono-Regular, Menlo, monospace;

    --ease-glide: cubic-bezier(0.22, 1, 0.36, 1);
}
```
