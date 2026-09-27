# Rashee Enterprises — Website

Marketing website for **Rashee Enterprises** (*Empowering Your Business, One Solution at a Time.*),
built with Laravel from the Rashee Enterprises Design System made in Claude Design.

## Pages

| Route | Page |
| --- | --- |
| `/` | Home — hero, values, featured products, about, CTA |
| `/products` | Catalog — category filter, search, sort, and a session-based quote basket |
| `/solutions` | Manufacturing, Trading & Distribution, Online B2B Sales |
| `/about` | About, mission, vision, values |
| `/contact` | Contact form |

Contact and quote submissions are stored in the `enquiries` table and, if `RASHEE_NOTIFY_EMAIL`
is set, emailed to that address.

## Setup

Requires PHP 8.3+, Composer and Node 20+.

```sh
composer install
cp .env.example .env
php artisan key:generate
touch database/database.sqlite
php artisan migrate
npm install
npm run build        # or `npm run dev` while editing CSS/JS
php artisan serve
```

Run the tests with `php artisan test`.

## Where things live

- **Content** (company details, stats, values, catalog, solutions): `config/rashee.php`.
  Contact details and social links can be overridden in `.env`.
- **Design tokens** (colours, type scale, spacing, radii, shadows, motion): `resources/css/tokens.css`,
  taken from the design system's `tokens.css`.
- **Component styles** (buttons, cards, badges, forms, dialog, toast, layout): `resources/css/app.css`.
- **Views**: `resources/views/pages/*`, shared chrome in `resources/views/partials/*`,
  Blade components (`x-ui-icon`, `x-badge`, `x-input`, `x-select`, …) in `resources/views/components/*`.
- **Brand assets**: `public/images/logos`, `public/images/imagery`, self-hosted Oswald + Roboto Flex
  variable fonts in `public/fonts`.
- **Icons**: [Lucide](https://lucide.dev), rendered server-side via `mallardduck/blade-lucide-icons`.

The site works without JavaScript; `resources/js/app.js` only adds the mobile menu, dialog,
toast auto-dismiss and auto-submitting catalog filters.
