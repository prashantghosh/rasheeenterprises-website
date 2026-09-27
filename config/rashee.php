<?php

/*
|--------------------------------------------------------------------------
| Rashee Enterprises — site content
|--------------------------------------------------------------------------
|
| Company details and catalog data rendered by the marketing site. Contact
| details can be overridden per-environment from .env.
|
*/

return [

    'name' => 'Rashee Enterprises',

    'slogan' => 'Empowering Your Business, One Solution at a Time.',

    'contact' => [
        'email' => env('RASHEE_CONTACT_EMAIL', 'sales@rashee.example'),
        'phone' => env('RASHEE_CONTACT_PHONE', '+1 (555) 018-2200'),
        'address' => env('RASHEE_CONTACT_ADDRESS', '1200 Industrial Parkway, Suite 400'),
    ],

    // Address that receives contact and quote requests. Leave empty to only store them.
    'notify_email' => env('RASHEE_NOTIFY_EMAIL'),

    'social' => [
        'linkedin' => env('RASHEE_SOCIAL_LINKEDIN', '#'),
        'twitter' => env('RASHEE_SOCIAL_TWITTER', '#'),
        'facebook' => env('RASHEE_SOCIAL_FACEBOOK', '#'),
        'instagram' => env('RASHEE_SOCIAL_INSTAGRAM', '#'),
    ],

    'stats' => [
        ['25+', 'Years in business'],
        ['1,200+', 'B2B partners'],
        ['98%', 'On-time delivery'],
    ],

    'values' => [
        ['icon' => 'shield-check', 'title' => 'Integrity', 'body' => 'We hold ourselves to the highest standards in every transaction and partnership.'],
        ['icon' => 'circle-check-big', 'title' => 'Reliability', 'body' => 'Consistent quality and on-time delivery your operations can depend on.'],
        ['icon' => 'lightbulb', 'title' => 'Innovation', 'body' => 'Dynamic strategies and modern tooling that move your business forward.'],
    ],

    'featured' => [
        ['name' => 'Industrial Fasteners', 'tag' => 'Manufacturing', 'badge' => ['In stock', 'success'], 'icon' => 'bolt'],
        ['name' => 'CNC Machined Parts', 'tag' => 'Fabrication', 'badge' => ['Featured', 'gold'], 'icon' => 'cog'],
        ['name' => 'Bulk Raw Materials', 'tag' => 'Trading', 'badge' => ['In stock', 'success'], 'icon' => 'package'],
        ['name' => 'Custom Packaging', 'tag' => 'Online', 'badge' => ['Low stock', 'warning'], 'icon' => 'box'],
    ],

    'solutions' => [
        ['icon' => 'factory', 'title' => 'Manufacturing', 'body' => 'Precision components, made-to-spec with rapid turnaround and full QA.'],
        ['icon' => 'truck', 'title' => 'Trading & Distribution', 'body' => 'Reliable sourcing and logistics across raw materials and finished goods.'],
        ['icon' => 'monitor', 'title' => 'Online B2B Sales', 'body' => 'A modern storefront and quoting workflow built for procurement teams.'],
    ],

    'interests' => ['Manufacturing', 'Trading', 'Bulk order', 'Partnership'],

    'categories' => ['Fasteners', 'Fabrication', 'Raw Materials', 'Packaging'],

    // Price is per unit, in the site currency.
    'catalog' => [
        ['slug' => 'hex-bolts-m8', 'name' => 'Hex Bolts M8', 'category' => 'Fasteners', 'price' => 0.12, 'stock' => ['In stock', 'success'], 'icon' => 'bolt', 'popularity' => 9],
        ['slug' => 'cnc-bracket-a2', 'name' => 'CNC Bracket A2', 'category' => 'Fabrication', 'price' => 4.80, 'stock' => ['Featured', 'gold'], 'icon' => 'cog', 'popularity' => 8],
        ['slug' => 'aluminium-sheet', 'name' => 'Aluminium Sheet', 'category' => 'Raw Materials', 'price' => 32.00, 'stock' => ['In stock', 'success'], 'icon' => 'layers', 'popularity' => 7],
        ['slug' => 'corrugated-box-l', 'name' => 'Corrugated Box L', 'category' => 'Packaging', 'price' => 0.65, 'stock' => ['Low stock', 'warning'], 'icon' => 'box', 'popularity' => 6],
        ['slug' => 'stainless-rods', 'name' => 'Stainless Rods', 'category' => 'Raw Materials', 'price' => 18.40, 'stock' => ['In stock', 'success'], 'icon' => 'minus', 'popularity' => 5],
        ['slug' => 'precision-gears', 'name' => 'Precision Gears', 'category' => 'Fabrication', 'price' => 12.20, 'stock' => ['In stock', 'success'], 'icon' => 'settings', 'popularity' => 4],
        ['slug' => 'nylon-washers', 'name' => 'Nylon Washers', 'category' => 'Fasteners', 'price' => 0.04, 'stock' => ['In stock', 'success'], 'icon' => 'circle', 'popularity' => 3],
        ['slug' => 'pallet-wrap-500m', 'name' => 'Pallet Wrap 500m', 'category' => 'Packaging', 'price' => 9.90, 'stock' => ['Backorder', 'neutral'], 'icon' => 'package', 'popularity' => 2],
        ['slug' => 'copper-wire-2-5mm', 'name' => 'Copper Wire 2.5mm', 'category' => 'Raw Materials', 'price' => 45.00, 'stock' => ['Featured', 'gold'], 'icon' => 'cable', 'popularity' => 1],
    ],

];
