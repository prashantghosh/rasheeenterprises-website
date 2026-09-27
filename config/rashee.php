<?php

/*
|--------------------------------------------------------------------------
| Rashee Enterprises — site content
|--------------------------------------------------------------------------
|
| Everything the marketing site renders: company details, the product
| catalog, industries and page copy. Contact details and marketplace links
| can be overridden per-environment from .env.
|
*/

$bopp = [
    'Micron' => ['help' => 'Film thickness — pick by carton weight', 'options' => ['38µ', '40µ', '45µ', '50µ']],
    'Width' => ['help' => '48mm is the standard carton seal', 'options' => ['12mm', '24mm', '48mm', '72mm']],
    'Roll length' => ['help' => 'Longer rolls mean fewer line stops', 'options' => ['40m', '65m', '100m']],
];

$boppSpecs = [
    ['Backing film', 'Biaxially oriented polypropylene'],
    ['Total thickness', '{Micron} (±2µ per batch)'],
    ['Adhesive system', 'Water-based acrylic, solvent-free'],
    ['Width', '{Width} (slit tolerance ±0.5mm)'],
    ['Roll length', '{Roll length}'],
    ['Peel adhesion, steel', '38 N per 100mm'],
    ['Tensile strength', 'Approx. 105 N per 25mm'],
    ['Elongation at break', '140–180%'],
    ['Service temperature', '5°C to 50°C'],
    ['Core diameter', '76mm (3 inch)'],
    ['Rolls per box', '{rolls}'],
];

$tapePacks = [
    ['Pack of 6', 'Small buyers, marketplace listed'],
    ['Pack of 12', 'Most common D2C size'],
    ['1 Box (36 rolls)', 'Best per-roll rate, printable'],
    ['Bulk Pallet', 'Priced to spec — enquiry only'],
];

$strapPacks = [
    ['1 Bag (5 boxes)', 'Minimum order, printable'],
    ['5 Bags', 'Common monthly despatch volume'],
    ['Bulk Pallet', 'Priced to spec — enquiry only'],
];

$boppFaqs = [
    ['Can I order a single box?', 'Yes. One box is a real order here, printed or plain. Industry minimums for printed tape run 10 to 25 boxes; ours is one.'],
    ['How many cartons will a box seal?', 'A box of 36 rolls at 65m seals roughly 2,300 medium cartons with a single centre strip, or about 780 with a full H-pattern.'],
    ['Is the adhesive food-safe?', 'The acrylic is water-based and solvent-free, suitable for secondary food packaging. It is not intended for direct food contact.'],
    ['What if the width I need is not listed?', 'We slit anything between 12 and 72mm. Non-standard widths are made to order — send the width and quantity and we will confirm lead time.'],
];

$tapeHighlights = [
    ['droplets', 'Water-based adhesive'],
    ['ruler', 'Micron tested per batch'],
    ['truck', 'Dispatch in 24 hours'],
];

return [

    'name' => 'Rashee Enterprises',

    'tagline' => 'Adding care to product',

    'promise' => 'Wherever there are boxes, there is Rashee. We price flexibly because a small buyer and a national distributor both deserve the correct micron — your budget, our honest execution; your spec, exact delivery.',

    'contact' => [
        'email' => env('RASHEE_CONTACT_EMAIL', 'contact@rasheeenterprises.com'),
        'phone' => env('RASHEE_CONTACT_PHONE', '+91-XXXXXXXXXX'),
        // Digits only, with country code, e.g. 919820012345. Leave empty to send WhatsApp buttons to the contact page.
        'whatsapp' => env('RASHEE_WHATSAPP'),
        'hours' => 'Mon–Sat, 9:30–18:30 IST',
        'address' => ['Unit 4, Industrial Estate', 'Mumbai, Maharashtra'],
    ],

    // Address that receives enquiries. Leave empty to only store them in the database.
    'notify_email' => env('RASHEE_NOTIFY_EMAIL'),

    'social' => [
        'linkedin' => env('RASHEE_SOCIAL_LINKEDIN', '#'),
        'instagram' => env('RASHEE_SOCIAL_INSTAGRAM', '#'),
    ],

    'marketplaces' => [
        'shopify' => ['name' => 'Buy on Shopify', 'note' => 'Rashee official store', 'url' => env('RASHEE_SHOPIFY_URL', '#')],
        'amazon' => ['name' => 'Buy on Amazon', 'note' => 'Prime eligible', 'url' => env('RASHEE_AMAZON_URL', '#')],
        'flipkart' => ['name' => 'Buy on Flipkart', 'note' => 'Pack of 6', 'url' => env('RASHEE_FLIPKART_URL', '#')],
    ],

    'nav' => [
        ['label' => 'Packaging Products', 'route' => 'products.index', 'match' => 'products.*', 'menu' => [
            ['All packaging products', 'products.index', []],
            ['BOPP self-adhesive tapes', 'products.index', ['category' => 'Self-adhesive tapes']],
            ['Customized printed logo tapes', 'products.show', ['slug' => 'customized-printed-logo-tape']],
            ['PP strapping patty', 'products.index', ['category' => 'Strapping']],
            ['Masking tape', 'products.show', ['slug' => 'paper-masking-tape']],
            ['Glass filament tape', 'products.show', ['slug' => 'glass-filament-tape']],
        ]],
        ['label' => 'Custom Solutions', 'route' => 'custom', 'match' => 'custom', 'menu' => [
            ['Custom brand printing', 'custom', []],
            ['Printed logo tape', 'products.show', ['slug' => 'customized-printed-logo-tape']],
            ['Custom widths & specs', 'contact', []],
        ]],
        ['label' => 'Industries', 'route' => 'industries', 'match' => 'industries'],
        ['label' => 'Sustainability', 'route' => 'sustainability', 'match' => 'sustainability'],
        ['label' => 'About', 'route' => 'about', 'match' => 'about'],
    ],

    'trust' => [
        ['droplets', 'Water-based adhesive, no solvent'],
        ['ruler', 'Micron tested per batch'],
        ['stamp', 'Custom print from 1 box'],
        ['truck', 'Dispatch in 24 hours on stock lines'],
    ],

    'promises' => [
        ['icon' => 'ruler', 'title' => 'Specified, not guessed', 'body' => 'Tell us the carton weight and how it travels. We come back with a micron and an adhesive, and we say when a cheaper grade would hold just as well.', 'proof' => 'Tensile and peel checked per batch'],
        ['icon' => 'package', 'title' => 'One box is a real order', 'body' => 'Industry minimums for printed tape run 10 to 25 boxes. Ours is one box, or one bag of strapping patty — the same film, the same ink, the same plant.', 'proof' => 'MOQ: 1 box tape · 1 bag patty'],
        ['icon' => 'indian-rupee', 'title' => 'Priced for who you are', 'body' => 'Marketplace listings carry honest D2C pricing for small packs. Volume moves to slab pricing with freight stated up front, never buried in the unit rate.', 'proof' => 'Slab pricing quoted in one working day'],
    ],

    // Homepage "Four families" cards. `product` is the slug the card opens.
    'families' => [
        ['key' => 'tapes', 'product' => 'bopp-tan-carton-tape', 'artwork' => 'bopp', 'eco' => true,
            'name' => 'BOPP Self-Adhesive Tapes',
            'blurb' => 'The workhorse carton seal. Pick micron by box weight, not by habit.',
            'badges' => ['38–60 micron', '12–72mm', '40m / 65m / 100m'],
            'meta' => ['Adhesive', 'Water-based acrylic'], 'moq' => 'Custom print from 1 box',
            'price' => 'From ₹385 per box', 'price_note' => null,
            'shot' => 'Studio: stacked tan BOPP rolls, 45° isometric, soft top light.',
            'alt' => 'Four rolls of tan BOPP packaging tape stacked in a pyramid on a pale grey surface.'],
        ['key' => 'custom', 'product' => 'customized-printed-logo-tape', 'artwork' => 'printed', 'eco' => false,
            'name' => 'Customized Printed Logo Tapes',
            'blurb' => 'Your logo in up to three colours, on the adhesive we ship to pharma.',
            'badges' => ['40–50 micron', '48mm / 72mm', '2–3 colour print'],
            'meta' => ['Print process', 'Flexographic, water-based ink'], 'moq' => 'Minimum 1 box · industry norm 10–25',
            'price' => 'Priced to spec', 'price_note' => 'Made to order. Quoted on artwork, width and quantity.',
            'shot' => 'Studio: printed logo tape mid-application along a carton seam, shallow depth.',
            'alt' => 'A hand applying custom-printed tape carrying a repeated logo along a cardboard carton seam.'],
        ['key' => 'strapping', 'product' => 'pp-strapping-patty-manual', 'artwork' => 'strapping', 'eco' => true,
            'name' => 'PP Strapping Patty',
            'blurb' => 'High-tensile bundling for pallets and heavy cases. Recyclable polypropylene.',
            'badges' => ['8–19mm width', '0.5–1.0mm gauge', 'Manual / machine'],
            'meta' => ['Break strength', 'Up to 1,250 N per 25mm'], 'moq' => 'Custom print from 1 bag (5 boxes)',
            'price' => 'From ₹1,240 per bag', 'price_note' => null,
            'shot' => 'Studio: two coils of green strapping stacked flat, raking side light.',
            'alt' => 'Two coils of green polypropylene strapping laid flat, one resting on the other.'],
        ['key' => 'tapes', 'product' => 'paper-masking-tape', 'artwork' => 'masking', 'eco' => false,
            'name' => 'Masking & Filament Tapes',
            'blurb' => 'Clean-peel paper masking for finishing lines, glass-reinforced filament for bundling.',
            'badges' => ['24mm / 48mm', 'Low-tack & high-tensile', 'Paper / reinforced'],
            'meta' => ['Adhesive', 'Rubber-resin, clean removal'], 'moq' => 'Sold from 1 box',
            'price' => 'From ₹460 per box', 'price_note' => null,
            'shot' => 'Studio: cream masking roll beside a reinforced filament roll, cool daylight.',
            'alt' => 'A cream paper masking tape roll standing beside a roll of glass-filament reinforced tape.'],
    ],

    'family_tabs' => [
        ['All', 'All lines'],
        ['tapes', 'Self-adhesive tapes'],
        ['strapping', 'Strapping'],
        ['custom', 'Custom printed'],
    ],

    'print_steps' => [
        ['title' => 'Send your artwork', 'body' => 'PDF, AI or CDR with fonts outlined. One to three spot colours. No artwork yet? Send a logo and we will set the repeat.', 'when' => 'Same day acknowledgement'],
        ['title' => 'We confirm the spec', 'body' => 'Micron, width and adhesive matched to your carton weight and how it ships. You get the reasoning, not just a rate.', 'when' => 'Within 1 working day'],
        ['title' => 'Approve a digital proof', 'body' => 'Repeat length, colour placement and print direction shown on the actual film before we mount a cylinder.', 'when' => '1–2 working days'],
        ['title' => 'Print and dispatch', 'body' => 'Printed, slit to your width and boxed. Reorders skip straight to production on the same cylinder.', 'when' => '5–7 working days'],
    ],

    'print_facts' => [
        ['Print colours', 'Up to 3, on tan or milky white film'],
        ['Artwork', 'PDF, AI or CDR with fonts outlined'],
        ['Lead time', '5–7 working days after proof approval'],
    ],

    // Industries.dc.html SECTORS. `products` are the catalog lines "View recommended lines" opens.
    'industries' => [
        ['slug' => 'pharma', 'name' => 'Pharma & healthcare', 'icon' => 'pill', 'tone' => '#e2f1fa',
            'spec' => '45µ tan, tamper-evident print',
            'reveal' => 'Batch-traceable rolls and a water-based adhesive that leaves no residue on validated cartons. Print carries your batch legend.',
            'headline' => 'A pharma case has to prove it was never opened',
            'body' => 'Secondary packaging for medicines is inspected, not just shipped. What matters is that a tampered seal is obvious and that the adhesive leaves nothing behind on a carton that may be swabbed. We supply printed tape carrying a batch legend, on the same water-based acrylic across every run so peel behaviour does not drift between deliveries.',
            'specs' => [['Thickness', '45µ'], ['Width', '48mm'], ['Adhesive', 'Water-based acrylic']],
            'failures' => [
                'Solvent-based adhesive leaving residue that shows up on a cleanliness swab.',
                'Mixed batches with different tack, so a validated sealing line starts producing inconsistent seals.',
            ],
            'shot' => 'Studio: sealed pharma carton with printed tamper-evident tape along the seam, clinical white light.',
            'alt' => 'A white pharmaceutical carton sealed with printed tamper-evident tape along its centre seam.',
            'filter' => ['category' => 'Custom printed']],
        ['slug' => 'ecommerce', 'name' => 'E-commerce fulfilment', 'icon' => 'package', 'tone' => '#dbe9f2',
            'spec' => '40–45µ, 48mm, printed',
            'reveal' => 'Built for high-volume manual sealing: consistent unwind, low noise, and logo print that survives the last mile.',
            'headline' => 'The seal is the first thing your customer touches',
            'body' => 'Fulfilment is a volume game with a branding moment at the end of it. Packers need tape that unwinds without snatching for eight hours; the buyer needs a parcel that arrives intact and looks deliberate. Printed tape at one box makes that affordable at any scale, and the low-noise grade matters more than most operations expect on a bench staffed all shift.',
            'specs' => [['Thickness', '40–45µ'], ['Width', '48mm'], ['Print', '1–3 colours']],
            'failures' => [
                'Thin film chosen on price alone, which then needs two passes and costs more per parcel.',
                'Buying unbranded because the printed minimum was 25 boxes, and losing the unboxing moment entirely.',
            ],
            'shot' => 'Studio: stacked e-commerce mailer cartons sealed with printed tape, warm daylight from the left.',
            'alt' => 'Three e-commerce mailer cartons stacked and sealed with printed logo tape along each centre seam.',
            'filter' => ['application' => 'Cartons & e-commerce']],
        ['slug' => 'cold-storage', 'name' => 'Cold storage & frozen', 'icon' => 'snowflake', 'tone' => '#d3e9f6',
            'spec' => '50µ+, low-temperature tack',
            'reveal' => 'Adhesive selected to hold at −18°C on damp fibreboard, where standard acrylic lets go at the flap.',
            'headline' => 'Standard acrylic releases at the flap around −10°C',
            'body' => 'Cold chain is where generic tape fails most visibly. Fibreboard picks up moisture in a chiller, the adhesive never fully wets the surface, and the flap lifts somewhere between the cold room and the truck. The low-temperature grade is formulated to bond on a damp, cold surface and hold at −18°C. Specify it against the coldest point in the journey, not the warehouse average.',
            'specs' => [['Thickness', '50–55µ'], ['Rated to', '−18°C'], ['Adhesive', 'Low-temperature acrylic']],
            'failures' => [
                'Specifying by warehouse temperature rather than the coldest point in transit.',
                'Sealing a carton that is already frosted — the adhesive cannot wet the surface and the bond never forms.',
            ],
            'shot' => 'Studio: frost-dusted carton corner with tape sealed across the flap, cold blue key light.',
            'alt' => 'The corner of a frost-dusted carton with packaging tape sealed firmly across the flap.',
            'filter' => ['application' => 'Cold storage & frozen']],
        ['slug' => 'fmcg', 'name' => 'FMCG & food', 'icon' => 'shopping-basket', 'tone' => '#e6f0f5',
            'spec' => '38–42µ, high-speed lines',
            'reveal' => 'Machine-grade rolls with tight core tolerance so automatic taping heads do not stall mid-shift.',
            'headline' => 'On an automatic head, core tolerance matters more than micron',
            'body' => 'High-speed FMCG lines fail on mechanical consistency, not adhesion. A core that is a millimetre out of round makes a taping head skip, and a shift stops for a jam that looks like a machine fault. Our machine-grade rolls hold core tolerance to ±1mm and unwind tension within a narrow band, which is why a thinner 38 to 42 micron film is usually the right call here.',
            'specs' => [['Thickness', '38–42µ'], ['Core', '76mm, ±1mm'], ['Grade', 'Machine']],
            'failures' => [
                'Buying hand-grade rolls for an automatic head and blaming the machine for the jams.',
                'Over-specifying micron on light cartons, which adds cost per parcel with no gain in hold.',
            ],
            'shot' => 'Studio: FMCG cartons on a conveyor with a taping head above, motion held still.',
            'alt' => 'Cartons moving along a conveyor beneath an automatic taping head that seals each centre seam.',
            'filter' => ['thickness' => '38–42µ']],
        ['slug' => 'textiles', 'name' => 'Textiles & apparel', 'icon' => 'shirt', 'tone' => '#e8eef2',
            'spec' => '12mm PP strap, 0.5mm gauge',
            'reveal' => 'Bale strapping that grips compressed fabric without cutting into it, and prints cleanly for despatch marking.',
            'headline' => 'A strap that holds a bale can also cut through it',
            'body' => 'Compressed fabric pushes back. Too narrow a strap concentrates that force and slices into the outer layers; too thin a gauge snaps under it. Twelve millimetres at 0.5mm spreads the load across enough surface to hold a bale without marking the goods, and polypropylene will not rust-stain fabric in monsoon transit the way steel banding does.',
            'specs' => [['Width', '12mm'], ['Gauge', '0.5mm'], ['Break strength', '1,250 N / 25mm']],
            'failures' => [
                'Using 8mm strap on a compressed bale, which cuts the outer layers before it fails.',
                'Steel banding on textiles, which rust-marks the goods in humid transit.',
            ],
            'shot' => 'Studio: compressed fabric bale bound with two green polypropylene straps, raking side light.',
            'alt' => 'A compressed bale of fabric bound with two green polypropylene straps running across its width.',
            'filter' => ['category' => 'Strapping']],
        ['slug' => 'engineering', 'name' => 'Heavy engineering', 'icon' => 'wrench', 'tone' => '#dfe8ee',
            'spec' => '19mm strap, filament tape',
            'reveal' => 'PP and PET strapping specified against real pallet weight, replacing steel banding on most crated loads.',
            'headline' => 'Most crated loads no longer need steel',
            'body' => 'Steel banding is specified out of habit on machinery and fabricated parts. For the majority of crated loads, 19mm polypropylene or PET carries the tension with a fraction of the handling risk — no sharp recoil when it is cut, no rust bleed onto a painted surface, and it goes into the recycling stream rather than a scrap bin. Where a load genuinely exceeds PET, we will say so.',
            'specs' => [['Width', '19mm'], ['Gauge', '0.8–1.0mm'], ['Also', 'Filament tape']],
            'failures' => [
                'Defaulting to steel on loads PET handles comfortably, adding cost and handling injury risk.',
                'Under-tensioning a wide strap, which lets a crate shift and load-shares onto one corner.',
            ],
            'shot' => 'Studio: crated machinery part strapped across a pallet, industrial daylight from above.',
            'alt' => 'A crated machinery part strapped across a wooden pallet with two wide polypropylene bands.',
            'filter' => ['application' => 'Pallet & heavy bundling']],
    ],

    'eco_points' => [
        ['lead' => 'Water-based acrylic.', 'body' => 'No solvent in the coating line, so no solvent recovery and no residual smell in a sealed carton.'],
        ['lead' => 'PP strapping over steel.', 'body' => 'Recyclable, lighter to freight, and it will not rust-mark a crate in monsoon transit.'],
        ['lead' => 'Right-sized film.', 'body' => 'If 38 micron holds your load, we quote 38 micron. Selling you thickness you do not need is waste we are paid for.'],
        ['lead' => 'Core and carton reuse.', 'body' => 'Returned cores go back into the winding line; outer cartons are reused for local dispatch.'],
    ],

    'thickness_guide' => [
        ['band' => 'Light duty · under 5 kg', 'micron' => '38–40µ', 'note' => 'Light e-commerce parcels and mailer boxes. Thicker film here is money spent on nothing.'],
        ['band' => 'Medium duty · 5–18 kg', 'micron' => '42–45µ', 'note' => 'Standard FMCG and pharma cartons, single strip or H-pattern along the centre seam.'],
        ['band' => 'Heavy duty · over 18 kg', 'micron' => '50µ and above', 'note' => 'Heavy or cold-chain loads on recycled fibreboard, where the flap wants to lift.'],
    ],

    'duty_matrix' => [
        ['duty' => 'Light duty', 'weight' => 'Under 5 kg', 'micron' => '38–40µ', 'pattern' => 'Single centre strip', 'tag' => 'Mailers, apparel, light e-commerce', 'bands' => ['38µ', '40µ']],
        ['duty' => 'Medium duty', 'weight' => '5–18 kg', 'micron' => '42–45µ', 'pattern' => 'Centre strip, or H-pattern if stacked', 'tag' => 'FMCG, pharma, general cartons', 'bands' => ['45µ']],
        ['duty' => 'Heavy duty', 'weight' => 'Over 18 kg', 'micron' => '50µ and above', 'pattern' => 'H-pattern, add strapping over 25 kg', 'tag' => 'Cold chain, machinery, bulk', 'bands' => ['50µ', '55µ', '60µ']],
    ],

    'choose_guidance' => [
        ['icon' => 'scale', 'title' => 'Weigh a full carton first', 'body' => 'Under 5 kg, 38–40µ holds. Between 5 and 18 kg, 42–45µ. Above 18 kg or on damp recycled board, go to 50µ and above.'],
        ['icon' => 'layers', 'title' => 'One strip or three', 'body' => 'A single centre strip is enough for light parcels. Heavier cartons want an H-pattern, which changes how many rolls a box of tape covers.'],
        ['icon' => 'thermometer', 'title' => 'Check the coldest point', 'body' => 'Adhesive is specified for the lowest temperature the carton will see, not the warehouse average. Cold-chain loads need the low-temperature grade.'],
    ],

    'filters' => [
        'Category' => ['help' => 'Tapes and strapping are quoted on different sheets.', 'type' => 'list', 'options' => ['Self-adhesive tapes', 'Strapping', 'Custom printed']],
        'Thickness' => ['help' => 'Film micron. Match it to carton weight, not to habit.', 'type' => 'chips', 'options' => ['38–42µ', '45–50µ', '50µ and above']],
        'Width' => ['help' => '48mm is the standard carton seal; 12–24mm for bundling.', 'type' => 'chips', 'options' => ['12mm', '15mm', '24mm', '48mm', '72mm']],
        'Colour' => ['help' => 'Swatch and name together — never colour alone.', 'type' => 'chips', 'options' => ['Tan', 'Clear', 'Milky white', 'Cream', 'Green', 'Black', 'Printed']],
        'Application' => ['help' => 'What the load is, and how far it travels.', 'type' => 'list', 'options' => ['Cartons & e-commerce', 'Cold storage & frozen', 'Pallet & heavy bundling', 'Masking & finishing']],
    ],

    'swatches' => [
        'Tan' => '#c99a63', 'Clear' => '#eef3f6', 'Milky white' => '#f7fafb', 'Cream' => '#e8dcc0',
        'Green' => '#2fa96b', 'Black' => '#26333d', 'Printed' => 'linear-gradient(100deg,#a77d31 0%,#f3d170 34%,#a7dbf0 66%,#41a9dc 100%)',
    ],

    /*
    |--------------------------------------------------------------------------
    | Catalog
    |--------------------------------------------------------------------------
    |
    | Each line drives its catalog card and its product page. `axes` are the
    | spec chips on the product page; `stock` lists the chip values held in
    | stock (anything else reads as made to order). Spec values may reference
    | a selected axis as {Axis name}.
    |
    */

    'catalog' => [
        [
            'slug' => 'bopp-clear-carton-tape', 'name' => 'BOPP Clear Carton Tape', 'category' => 'Self-adhesive tapes',
            'family' => 'Self-adhesive tapes', 'artwork' => 'bopp', 'eco' => true,
            'micron' => [40, 45], 'width' => [48], 'colours' => ['Clear'], 'application' => 'Cartons & e-commerce',
            'blurb' => 'Transparent seal for printed cartons where the box design should stay visible.',
            'badges' => ['40µ / 45µ', '48mm', '65m / 100m'], 'meta' => ['Adhesive', 'Water-based acrylic'],
            'moq' => 'Custom print from 1 box', 'price_from' => 385, 'unit' => 'box',
            'shot' => 'Studio: clear BOPP roll on end, light raking across the film edge.',
            'alt' => 'A roll of clear BOPP packaging tape standing on end on a pale grey surface.',
            'lead' => 'A transparent carton seal for printed boxes, coated with water-based acrylic and slit to your width. The box design stays visible and the seam still holds.',
            'axes' => $bopp + ['Colour' => ['help' => 'Swatch and name — never colour alone', 'options' => ['Clear', 'Tan', 'Milky white', 'Printed']]],
            'defaults' => ['Micron' => '45µ', 'Width' => '48mm', 'Roll length' => '65m', 'Colour' => 'Clear'],
            'stock' => ['Micron' => ['40µ', '45µ'], 'Width' => ['48mm'], 'Roll length' => ['65m', '100m'], 'Colour' => ['Clear']],
            'packs' => $tapePacks, 'marketplaces' => ['shopify', 'amazon', 'flipkart'],
            'highlights' => $tapeHighlights, 'specs' => $boppSpecs, 'duty' => true, 'faqs' => $boppFaqs,
            'related' => ['bopp-tan-carton-tape', 'low-noise-bopp-tape', 'customized-printed-logo-tape'],
        ],
        [
            'slug' => 'bopp-tan-carton-tape', 'name' => 'BOPP Self-Adhesive Carton Tape', 'card_name' => 'BOPP Tan Carton Tape', 'category' => 'Self-adhesive tapes',
            'family' => 'Self-adhesive tapes', 'artwork' => 'bopp', 'eco' => true,
            'micron' => [45, 50], 'width' => [48, 72], 'colours' => ['Tan'], 'application' => 'Cartons & e-commerce',
            'blurb' => 'The default warehouse seal. Higher tack on recycled fibreboard than clear film.',
            'badges' => ['45µ / 50µ', '48mm / 72mm', '65m'], 'meta' => ['Adhesive', 'Water-based acrylic'],
            'moq' => 'Custom print from 1 box', 'price_from' => 385, 'unit' => 'box',
            'shot' => 'Studio: stacked tan BOPP rolls, 45° isometric, soft top light.',
            'alt' => 'Four rolls of tan BOPP packaging tape stacked in a pyramid on a pale grey surface.',
            'lead' => 'The workhorse carton seal, coated with water-based acrylic and slit to your width. Pick the micron from the carton weight; we will tell you if a thinner grade would hold just as well.',
            'axes' => $bopp + ['Colour' => ['help' => 'Swatch and name — never colour alone', 'options' => ['Tan', 'Clear', 'Milky white', 'Printed']]],
            'defaults' => ['Micron' => '45µ', 'Width' => '48mm', 'Roll length' => '65m', 'Colour' => 'Tan'],
            'stock' => ['Micron' => ['40µ', '45µ', '50µ'], 'Width' => ['24mm', '48mm', '72mm'], 'Roll length' => ['40m', '65m', '100m'], 'Colour' => ['Tan', 'Clear', 'Milky white']],
            'packs' => $tapePacks, 'marketplaces' => ['shopify', 'amazon', 'flipkart'],
            'highlights' => $tapeHighlights, 'specs' => $boppSpecs, 'duty' => true, 'faqs' => $boppFaqs,
            'related' => ['cold-storage-bopp-tape', 'pp-strapping-patty-manual', 'glass-filament-tape'],
        ],
        [
            'slug' => 'customized-printed-logo-tape', 'name' => 'Customized Printed Logo Tape', 'category' => 'Custom printed',
            'family' => 'Custom printed tapes', 'artwork' => 'printed', 'eco' => false, 'custom' => true,
            'micron' => [45, 50], 'width' => [48, 72], 'colours' => ['Printed', 'Tan', 'Milky white'], 'application' => 'Cartons & e-commerce',
            'blurb' => 'Your logo in up to three colours, on the adhesive we ship to pharma clients.',
            'badges' => ['45µ / 50µ', '48mm / 72mm', '2–3 colour'], 'meta' => ['Print process', 'Flexographic, water-based ink'],
            'moq' => 'Minimum 1 box · industry norm 10–25', 'price_from' => null, 'unit' => 'box',
            'price_note' => 'Made to order. Quoted on artwork, width and quantity.',
            'shot' => 'Studio: printed logo tape mid-application along a carton seam, shallow depth.',
            'alt' => 'A hand applying custom-printed tape carrying a repeated logo along a cardboard carton seam.',
            'lead' => 'Your logo repeated along the film, printed in up to three spot colours on the same water-based acrylic tape we ship to pharma clients. Produced per order from a single box, so a first run can carry your brand.',
            'highlights' => [['stamp', 'From 1 box'], ['palette', 'Up to 3 spot colours'], ['clock', '5–7 day lead time']],
            'axes' => $bopp + ['Colour' => ['help' => 'Base film under your print', 'options' => ['Tan', 'Milky white', 'Clear']]],
            'defaults' => ['Micron' => '45µ', 'Width' => '48mm', 'Roll length' => '65m', 'Colour' => 'Tan'],
            'stock' => [],
            'packs' => [
                ['1 Box (36 rolls)', 'Minimum order · industry norm is 10–25'],
                ['3 Boxes', 'Common first branded run'],
                ['10 Boxes', 'Slab pricing begins here'],
                ['Bulk Pallet', 'Priced to spec — enquiry only'],
            ],
            'marketplaces' => [],
            'specs' => array_map(fn ($r) => match ($r[0]) {
                'Adhesive system' => ['Adhesive system', 'Water-based acrylic, flexo-printed'],
                'Service temperature' => ['Service temperature', '0°C to 50°C'],
                default => $r,
            }, $boppSpecs),
            'duty' => true, 'faqs' => $boppFaqs,
            'related' => ['bopp-tan-carton-tape', 'bopp-clear-carton-tape', 'low-noise-bopp-tape'],
        ],
        [
            'slug' => 'low-noise-bopp-tape', 'name' => 'Low-Noise BOPP Tape', 'category' => 'Self-adhesive tapes',
            'family' => 'Self-adhesive tapes', 'artwork' => 'bopp', 'eco' => true,
            'micron' => [40, 45], 'width' => [48], 'colours' => ['Tan', 'Clear'], 'application' => 'Cartons & e-commerce',
            'blurb' => 'Quieter unwind for packing benches staffed all shift. Same hold as standard tan.',
            'badges' => ['40µ / 45µ', '48mm', '65m'], 'meta' => ['Unwind noise', 'Approx. 12 dB below standard'],
            'moq' => 'Custom print from 1 box', 'price_from' => 430, 'unit' => 'box',
            'shot' => 'Studio: single roll unwinding a short tail, motion held still.',
            'alt' => 'A tan tape roll with a short unwound tail curling away from the roll face.',
            'lead' => 'A quieter unwind for packing benches staffed all shift, with the same hold as standard tan. Water-based acrylic, slit to your width.',
            'axes' => $bopp + ['Colour' => ['help' => 'Swatch and name — never colour alone', 'options' => ['Tan', 'Clear']]],
            'defaults' => ['Micron' => '45µ', 'Width' => '48mm', 'Roll length' => '65m', 'Colour' => 'Tan'],
            'stock' => ['Micron' => ['40µ', '45µ'], 'Width' => ['48mm'], 'Roll length' => ['65m'], 'Colour' => ['Tan', 'Clear']],
            'packs' => $tapePacks, 'marketplaces' => ['amazon'],
            'highlights' => [['droplets', 'Water-based adhesive'], ['ruler', 'Approx. 12 dB quieter unwind'], ['truck', 'Dispatch in 24 hours']],
            'specs' => array_merge($boppSpecs, [['Unwind noise', 'Approx. 12 dB below standard']]), 'duty' => true, 'faqs' => $boppFaqs,
            'related' => ['bopp-tan-carton-tape', 'bopp-clear-carton-tape', 'customized-printed-logo-tape'],
        ],
        [
            'slug' => 'cold-storage-bopp-tape', 'name' => 'Cold-Storage BOPP Tape', 'category' => 'Self-adhesive tapes',
            'family' => 'Self-adhesive tapes', 'artwork' => 'bopp', 'eco' => false,
            'micron' => [50, 55], 'width' => [48, 72], 'colours' => ['Tan'], 'application' => 'Cold storage & frozen',
            'blurb' => 'Holds at −18°C on damp fibreboard, where standard acrylic releases at the flap.',
            'badges' => ['50µ / 55µ', '48mm / 72mm', '−18°C rated'], 'meta' => ['Adhesive', 'Low-temperature acrylic'],
            'moq' => 'Custom print from 1 box', 'price_from' => 520, 'unit' => 'box',
            'shot' => 'Studio: tape roll beside a frost-dusted carton corner, cool blue light.',
            'alt' => 'A tape roll resting beside the corner of a carton with a light frost surface.',
            'lead' => 'A low-temperature acrylic that holds at −18°C on damp fibreboard, where standard acrylic releases at the flap. Specified for the coldest point your carton will see.',
            'highlights' => [['snowflake', 'Rated to −18°C'], ['ruler', 'Micron tested per batch'], ['truck', 'Dispatch in 24 hours']],
            'axes' => [
                'Micron' => ['help' => 'Heavier film for cold-chain loads', 'options' => ['45µ', '50µ', '55µ']],
                'Width' => ['help' => '48mm is the standard carton seal', 'options' => ['48mm', '72mm']],
                'Roll length' => ['help' => 'Longer rolls mean fewer line stops', 'options' => ['40m', '65m', '100m']],
                'Colour' => ['help' => 'Swatch and name — never colour alone', 'options' => ['Tan', 'Clear']],
            ],
            'defaults' => ['Micron' => '50µ', 'Width' => '48mm', 'Roll length' => '65m', 'Colour' => 'Tan'],
            'stock' => ['Micron' => ['50µ', '55µ'], 'Width' => ['48mm', '72mm'], 'Roll length' => ['65m'], 'Colour' => ['Tan']],
            'packs' => $tapePacks, 'marketplaces' => ['amazon'],
            'specs' => array_map(fn ($r) => match ($r[0]) {
                'Adhesive system' => ['Adhesive system', 'Low-temperature acrylic, solvent-free'],
                'Service temperature' => ['Service temperature', '−18°C to 40°C'],
                default => $r,
            }, $boppSpecs),
            'duty' => true, 'faqs' => $boppFaqs,
            'related' => ['bopp-tan-carton-tape', 'pp-strapping-patty-manual', 'glass-filament-tape'],
        ],
        [
            'slug' => 'paper-masking-tape', 'name' => 'Paper Masking Tape', 'category' => 'Self-adhesive tapes',
            'family' => 'Masking & filament tapes', 'artwork' => 'masking', 'eco' => false,
            'micron' => [38], 'width' => [24, 48], 'colours' => ['Cream'], 'application' => 'Masking & finishing',
            'blurb' => 'Clean-peel crepe paper for finishing and paint lines. Removes without ghosting.',
            'badges' => ['38µ', '24mm / 48mm', 'Clean peel'], 'meta' => ['Adhesive', 'Rubber-resin, clean removal'],
            'moq' => 'Sold from 1 box', 'price_from' => 460, 'unit' => 'box',
            'shot' => 'Studio: cream crepe masking roll, edge lit to show the paper texture.',
            'alt' => 'A cream crepe paper masking tape roll photographed from a low angle.',
            'lead' => 'Clean-peel crepe paper for finishing and paint lines. A rubber-resin adhesive that holds an edge and removes without ghosting.',
            'highlights' => [['droplets', 'Clean removal, no ghosting'], ['ruler', 'Tested per batch'], ['truck', 'Dispatch in 24 hours']],
            'axes' => [
                'Width' => ['help' => 'Narrow widths for fine edges', 'options' => ['24mm', '48mm']],
                'Colour' => ['help' => 'Swatch and name — never colour alone', 'options' => ['Cream']],
            ],
            'defaults' => ['Width' => '24mm', 'Colour' => 'Cream'],
            'stock' => ['Width' => ['24mm', '48mm'], 'Colour' => ['Cream']],
            'packs' => [['1 Box', 'Sold from one box'], ['5 Boxes', 'Line or workshop supply'], ['Bulk Pallet', 'Priced to spec — enquiry only']],
            'marketplaces' => ['amazon'],
            'specs' => [
                ['Backing', 'Crepe paper'],
                ['Thickness', '38µ'],
                ['Adhesive system', 'Rubber-resin, clean removal'],
                ['Width', '{Width} (slit tolerance ±0.5mm)'],
                ['Core diameter', '76mm (3 inch)'],
            ],
            'duty' => false,
            'faqs' => [
                ['Can I order a single box?', 'Yes. Masking tape is sold from one box, with no minimum beyond that.'],
                ['Will it lift fresh paint?', 'The rubber-resin adhesive is chosen for clean removal. Test on your finish first and remove within the working day for the cleanest edge.'],
                ['What if the width I need is not listed?', 'We slit anything between 12 and 72mm. Non-standard widths are made to order — send the width and quantity and we will confirm lead time.'],
            ],
            'related' => ['glass-filament-tape', 'bopp-tan-carton-tape', 'low-noise-bopp-tape'],
        ],
        [
            'slug' => 'glass-filament-tape', 'name' => 'Glass Filament Tape', 'category' => 'Self-adhesive tapes',
            'family' => 'Masking & filament tapes', 'artwork' => 'masking', 'eco' => false,
            'micron' => [55, 60], 'width' => [12, 24], 'colours' => ['Milky white'], 'application' => 'Pallet & heavy bundling',
            'blurb' => 'Glass-reinforced strands for bundling pipe, timber and heavy cases without a strap.',
            'badges' => ['55µ / 60µ', '12mm / 24mm', 'High tensile'], 'meta' => ['Break strength', 'Up to 300 N per 25mm'],
            'moq' => 'Sold from 1 box', 'price_from' => 690, 'unit' => 'box',
            'shot' => 'Studio: filament tape roll with strand pattern raked by side light.',
            'alt' => 'A roll of glass filament reinforced tape showing longitudinal strands through the film.',
            'lead' => 'Glass-reinforced strands running the length of the film, for bundling pipe, timber and heavy cases where a strap would be overkill.',
            'highlights' => [['layers', 'Glass-reinforced strands'], ['ruler', 'Up to 300 N per 25mm'], ['truck', 'Dispatch in 24 hours']],
            'axes' => [
                'Micron' => ['help' => 'Heavier film for heavier bundles', 'options' => ['55µ', '60µ']],
                'Width' => ['help' => 'Narrow widths for bundling', 'options' => ['12mm', '24mm']],
            ],
            'defaults' => ['Micron' => '55µ', 'Width' => '24mm'],
            'stock' => ['Micron' => ['55µ', '60µ'], 'Width' => ['12mm', '24mm']],
            'packs' => [['1 Box', 'Sold from one box'], ['5 Boxes', 'Workshop or site supply'], ['Bulk Pallet', 'Priced to spec — enquiry only']],
            'marketplaces' => ['amazon'],
            'specs' => [
                ['Reinforcement', 'Longitudinal glass filament'],
                ['Total thickness', '{Micron}'],
                ['Width', '{Width} (slit tolerance ±0.5mm)'],
                ['Break strength', 'Up to 300 N per 25mm'],
                ['Core diameter', '76mm (3 inch)'],
            ],
            'duty' => false,
            'faqs' => [
                ['Can I order a single box?', 'Yes. Filament tape is sold from one box.'],
                ['Filament tape or strapping?', 'Filament tape suits bundles you tape by hand, up to its break strength. Above that, or on pallets, PP strapping is the safer and cheaper hold.'],
                ['What if the width I need is not listed?', 'We slit anything between 12 and 72mm. Non-standard widths are made to order — send the width and quantity and we will confirm lead time.'],
            ],
            'related' => ['pp-strapping-patty-manual', 'paper-masking-tape', 'cold-storage-bopp-tape'],
        ],
        [
            'slug' => 'pp-strapping-patty-manual', 'name' => 'PP Strapping Patty — Manual', 'category' => 'Strapping',
            'family' => 'Strapping', 'artwork' => 'strapping', 'eco' => true, 'strap' => true,
            'micron' => [], 'width' => [12, 15], 'colours' => ['Green', 'Black'], 'application' => 'Pallet & heavy bundling',
            'blurb' => 'Hand-tensioned bundling for pallets and bales. Recyclable polypropylene.',
            'badges' => ['12mm / 15mm', '0.5–0.7mm gauge', 'Manual'], 'meta' => ['Break strength', 'Up to 1,250 N per 25mm'],
            'moq' => 'Custom print from 1 bag (5 boxes)', 'price_from' => 1240, 'unit' => 'bag',
            'price_note' => '1 bag = 5 boxes. D2C pricing. For bulk and custom orders, please enquire.',
            'shot' => 'Studio: two coils of green strapping stacked flat, raking side light.',
            'alt' => 'Two coils of green polypropylene strapping laid flat, one resting on the other.',
            'lead' => 'Hand-tensioned polypropylene strapping for pallets and bales. Recyclable, lighter to freight than steel, and it will not rust-mark a crate in monsoon transit.',
            'highlights' => [['recycle', 'Recyclable polypropylene'], ['ruler', 'Up to 1,250 N per 25mm'], ['truck', 'Dispatch in 24 hours']],
            'axes' => [
                'Width' => ['help' => 'Wider strap for heavier loads', 'options' => ['12mm', '15mm', '19mm']],
                'Gauge' => ['help' => 'Strap thickness', 'options' => ['0.5mm', '0.6mm', '0.7mm']],
                'Colour' => ['help' => 'Swatch and name — never colour alone', 'options' => ['Green', 'Black', 'Printed']],
            ],
            'defaults' => ['Width' => '12mm', 'Gauge' => '0.5mm', 'Colour' => 'Green'],
            'stock' => ['Width' => ['12mm', '15mm'], 'Gauge' => ['0.5mm', '0.6mm', '0.7mm'], 'Colour' => ['Green', 'Black']],
            'packs' => $strapPacks, 'marketplaces' => ['amazon'],
            'specs' => [
                ['Material', 'Polypropylene, recyclable'],
                ['Width', '{Width}'],
                ['Gauge', '{Gauge}'],
                ['Break strength', 'Up to 1,250 N per 25mm'],
                ['Application', 'Manual tensioner and seal'],
                ['Pack', '1 bag = 5 boxes'],
            ],
            'duty' => false,
            'faqs' => [
                ['Can I order a single bag?', 'Yes. One bag of strapping patty (5 boxes) is a real order, printed or plain.'],
                ['Can PP replace steel banding?', 'On most pallet and crate loads, yes. Send the pallet weight and we will confirm the width and gauge that holds it.'],
                ['Can the strap be printed?', 'Yes, from one bag. Despatch marking or your logo, repeated along the strap.'],
            ],
            'related' => ['pp-strapping-patty-machine', 'glass-filament-tape', 'bopp-tan-carton-tape'],
        ],
        [
            'slug' => 'pp-strapping-patty-machine', 'name' => 'PP Strapping Patty — Machine', 'category' => 'Strapping',
            'family' => 'Strapping', 'artwork' => 'strapping', 'eco' => true, 'strap' => true,
            'micron' => [], 'width' => [12], 'colours' => ['Green'], 'application' => 'Pallet & heavy bundling',
            'blurb' => 'Tight core tolerance for automatic strapping heads on continuous lines.',
            'badges' => ['12mm', '0.5mm gauge', 'Machine grade'], 'meta' => ['Core', '200mm, tolerance ±1mm'],
            'moq' => 'Custom print from 1 bag (5 boxes)', 'price_from' => 1180, 'unit' => 'bag',
            'price_note' => '1 bag = 5 boxes. D2C pricing. For bulk and custom orders, please enquire.',
            'shot' => 'Studio: machine-grade strapping coil upright on its core, cool daylight.',
            'alt' => 'An upright coil of green machine-grade polypropylene strapping on a plastic core.',
            'lead' => 'Machine-grade polypropylene strapping wound to a tight core tolerance, so automatic strapping heads on continuous lines do not stall mid-shift.',
            'highlights' => [['recycle', 'Recyclable polypropylene'], ['ruler', 'Core tolerance ±1mm'], ['truck', 'Dispatch in 24 hours']],
            'axes' => [
                'Width' => ['help' => 'Match your strapping head', 'options' => ['12mm', '15mm']],
                'Gauge' => ['help' => 'Strap thickness', 'options' => ['0.5mm', '0.6mm']],
                'Colour' => ['help' => 'Swatch and name — never colour alone', 'options' => ['Green', 'Black']],
            ],
            'defaults' => ['Width' => '12mm', 'Gauge' => '0.5mm', 'Colour' => 'Green'],
            'stock' => ['Width' => ['12mm'], 'Gauge' => ['0.5mm'], 'Colour' => ['Green']],
            'packs' => $strapPacks, 'marketplaces' => [],
            'specs' => [
                ['Material', 'Polypropylene, recyclable'],
                ['Width', '{Width}'],
                ['Gauge', '{Gauge}'],
                ['Core', '200mm, tolerance ±1mm'],
                ['Application', 'Automatic and semi-automatic strapping heads'],
                ['Pack', '1 bag = 5 boxes'],
            ],
            'duty' => false,
            'faqs' => [
                ['Will it run on my strapping machine?', 'Send the machine make and head width. We wind to a 200mm core at ±1mm so it feeds without stalls.'],
                ['Can I order a single bag?', 'Yes. One bag (5 boxes) is a real order, printed or plain.'],
                ['Can the strap be printed?', 'Yes, from one bag. Despatch marking or your logo, repeated along the strap.'],
            ],
            'related' => ['pp-strapping-patty-manual', 'bopp-tan-carton-tape', 'glass-filament-tape'],
        ],
    ],

];
