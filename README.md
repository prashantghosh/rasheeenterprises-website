# Rashee Enterprises — Website

Website for **Rashee Enterprises** (packaging tapes and PP strapping, Mumbai), built in Laravel
from the *Rashee Tapes* design made in Claude Design. The original design export is kept in
[`design/`](design) for reference — every page here is a port of the matching `.dc.html` file,
at both its desktop and mobile variants.

## Stack

- Laravel with plain Blade templates and anonymous Blade components.
- [Bootstrap 5.3](https://getbootstrap.com) (CSS + JS bundle) and [jQuery 3.7](https://jquery.com),
  both loaded from the jsDelivr CDN with SRI hashes (`resources/views/components/layouts/app.blade.php`).
- No Node, no build step: site CSS and JS are plain files in `public/css` and `public/js`.

## Pages

| Route | Page | Design file |
| --- | --- | --- |
| `/` | Home | `Homepage.dc.html` |
| `/packaging-products` | Catalog with filters (URL-driven), sort and thickness guide | `Catalog.dc.html` |
| `/packaging-products/{slug}` | Product page: variant picker, live SKU/price, spec table, duty matrix, FAQ | `PDP.dc.html` |
| `/custom-solutions` | Custom brand printing from one box | `CustomBrandPrinting.dc.html` |
| `/industries` | Industries we secure (sector tabs, `#sector` deep links) | `Industries.dc.html` |
| `/sustainability` | Sustainability & vision | `Sustainability.dc.html` |
| `/about` | About us & quality promise | `About.dc.html` |
| `/contact` | Contact form, channels, hours, routing | `Contact.dc.html` |

Every page shares the header, footer, floating/sticky quick actions and the *Instant Spec Quote*
enquiry modal. Enquiries (modal and contact form) are posted with AJAX and fall back to a normal form
post without JavaScript. They are stored in the `enquiries` table and, if `RASHEE_NOTIFY_EMAIL` is set,
emailed to that address.

## Setup

Requires PHP 8.3+ and Composer.

```sh
composer install
cp .env.example .env
php artisan key:generate
touch database/database.sqlite
php artisan migrate
php artisan serve
```

Run the tests with `php artisan test`.

## Where things live

- **Content** — company details, navigation, product catalog (specs, prices, variants, FAQs),
  industries, print steps: `config/rashee.php`. Contact details, WhatsApp number, marketplace
  and social links are set in `.env` (see `.env.example`).
- **Design tokens** — colours, type scale, spacing, radii, shadows: `public/css/tokens.css`.
- **Styles** — `public/css/rashee.css`. Custom classes that would clash with Bootstrap use an
  `rs-` prefix (`rs-btn`, `rs-card`, `rs-h1`…). Layouts switch to the design's mobile variant
  below 992px (Bootstrap `lg`); the header compacts below 1200px.
- **Behaviour** — `public/js/rashee.js` (jQuery): catalog filters, product variant picker,
  enquiry modal, industries tabs, contact topic chips.
- **Views** — pages in `resources/views/pages`, shared pieces in `resources/views/partials`,
  components (`x-ui-icon`, `x-product-card`, `x-cta-block`) in `resources/views/components`.
- **Icons** — [Lucide](https://lucide.dev) SVGs in `resources/icons`, inlined by `<x-ui-icon name="…" />`.
- **Brand assets** — logos in `public/images/logos`, self-hosted Oswald + Roboto Flex fonts in `public/fonts`.

## Still to fill in

- Phone and WhatsApp number (`RASHEE_CONTACT_PHONE`, `RASHEE_WHATSAPP`).
- Shopify, Amazon and Flipkart listing URLs, and LinkedIn / Instagram links.
- Full plant address (`contact.address` in `config/rashee.php`).
- Product photography: the design uses illustrated placeholders with studio-shot briefs as captions.
- PDF downloads (data sheets, compliance statements) currently open a pre-filled enquiry.
