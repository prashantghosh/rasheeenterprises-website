{{-- PDP.dc.html — the chips update SKU, price, availability and spec table client-side (public/js/rashee.js). --}}
@php
    $p = $product;
    $swatches = config('rashee.swatches');
    $d = $p['defaults'];
    $render = fn (string $tpl) => preg_replace_callback('/\{([^}]+)\}/', fn ($m) => $m[1] === 'rolls' ? (($d['Width'] ?? '') === '24mm' ? '72' : '36') : ($d[$m[1]] ?? ''), $tpl);
    $inStock = ! $p['custom'] && collect($p['stock'])->isNotEmpty() && collect($d)->every(fn ($v, $axis) => ! isset($p['stock'][$axis]) || in_array($v, $p['stock'][$axis]));
    $defaultPack = $p['packs'][0][0];
    $nums = collect($d)->map(fn ($v) => preg_replace('/[^\d]/', '', $v))->filter(fn ($v) => $v !== '')->values();
    $code = 'RS-'.$p['sku_code'].'-'.($nums->count() >= 2 ? $nums[0].$nums[1].($nums->slice(2)->isNotEmpty() ? '-'.$nums->slice(2)->implode('-') : '') : $nums->implode('-')).(isset($d['Colour']) ? '-'.strtoupper(substr($d['Colour'], 0, 2)) : '');
    $sku = $p['sku_name'].' '.collect($d)->values()->implode(' · ').' · '.$defaultPack;
    $price = $inStock ? $p['price'] : 'Priced to spec';
    $priceNote = $inStock ? ($p['price_note'] ?? 'D2C pricing. For bulk and custom orders, please enquire.') : 'Made to order. Quoted on spec, artwork and quantity — usually within one working day.';
    $views = [
        ['Studio: stacked tan BOPP rolls, 45° isometric, soft top light on a pale slate ground.', $p['alt']],
        ['Studio: single roll on end, film edge lit to show the section.', 'A single roll standing on end, lit to reveal the film edge.'],
        ['Studio: tape applied along a carton centre seam, hand in frame, shallow depth.', 'A hand pressing packaging tape along the centre seam of a sealed cardboard carton.'],
        ['Studio: sealed carton on a pallet corner, strapping band and taped seam both visible.', 'A sealed carton at the corner of a pallet, showing a taped centre seam and a green strapping band.'],
    ];
    $views[0] = [$p['shot'], $p['alt']];
    $js = [
        'name' => $p['name'], 'skuName' => $p['sku_name'], 'skuCode' => $p['sku_code'], 'custom' => $p['custom'],
        'price' => $p['price'], 'priceNote' => $p['price_note'] ?? 'D2C pricing. For bulk and custom orders, please enquire.',
        'stock' => (object) $p['stock'], 'defaults' => $d, 'pack' => $defaultPack,
    ];
@endphp
<x-layouts.app :title="$p['name']" :description="$p['lead']" :sticky-buy="true">
    <div class="wrap pdp-top" data-pdp='@json($js)'>
        <nav class="crumbs" aria-label="Breadcrumb">
            <a href="{{ route('home') }}">Home</a><span aria-hidden="true">/</span>
            <a href="{{ route('products.index') }}">Packaging Products</a><span aria-hidden="true">/</span>
            <a href="{{ route('products.index', ['category' => $p['category']]) }}">{{ $p['family'] }}</a><span aria-hidden="true">/</span>
            <span aria-current="page">{{ $p['name'] }}</span>
        </nav>

        <div class="pdp-split">
            <div class="gallery">
                <div class="art gallery__main view-0" role="img" aria-label="{{ $views[0][1] }}" data-gallery-main>
                    <i class="a"></i><i class="b"></i><i class="c"></i>
                    @if ($p['eco'])<span class="badge-eco"><x-ui-icon name="leaf" :size="14" /> Solvent-free adhesive</span>@endif
                    <span class="art__shot" aria-hidden="true" data-gallery-shot>{{ $views[0][0] }}</span>
                </div>
                <div class="thumbs">
                    @foreach ($views as $i => [$shot, $alt])
                        <button type="button" class="thumb" aria-pressed="{{ $i === 0 ? 'true' : 'false' }}" aria-label="Show view {{ $i + 1 }}: {{ $alt }}" data-view="{{ $i }}" data-shot="{{ $shot }}" data-alt="{{ $alt }}">
                            <span class="view-{{ $i }}"></span>
                        </button>
                    @endforeach
                </div>
                <span class="caption">alt: <span data-gallery-alt>{{ $views[0][1] }}</span></span>
            </div>

            <div class="buy">
                <div class="buy__head">
                    <span class="eyebrow">{{ $p['family'] }}</span>
                    <h1 class="rs-h1 rs-h1--pdp">{{ $p['name'] }}</h1>
                    <p class="buy__lead">{{ $p['lead'] }}</p>
                </div>

                <div class="highlights">
                    @foreach ($p['highlights'] as [$icon, $label])
                        <span><x-ui-icon :name="$icon" :size="16" /> {{ $label }}</span>
                    @endforeach
                </div>

                @foreach ($p['axes'] as $axis => $def)
                    <fieldset class="axis">
                        <legend class="axis__label"><strong>{{ $axis }}</strong> <span>{{ $def['help'] }}</span></legend>
                        <div class="vchips">
                            @foreach ($def['options'] as $opt)
                                <button type="button" class="vchip" data-axis="{{ $axis }}" data-value="{{ $opt }}" aria-pressed="{{ $d[$axis] === $opt ? 'true' : 'false' }}">
                                    @if ($axis === 'Colour')<span class="swatch" style="background:{{ $swatches[$opt] }}"></span>@endif
                                    <x-ui-icon name="check" :size="15" /> {{ $opt }}
                                </button>
                            @endforeach
                        </div>
                    </fieldset>
                @endforeach

                <fieldset class="packs">
                    <legend class="axis__label"><strong>Pack size</strong> <span>How it ships. Separate from the spec above.</span></legend>
                    <div class="packs__grid">
                        @foreach ($p['packs'] as $i => [$label, $note])
                            <button type="button" class="pack" data-pack="{{ $label }}" aria-pressed="{{ $i === 0 ? 'true' : 'false' }}">
                                <span class="pack__label">{{ $label }}</span>
                                <span class="pack__note">{{ $note }}</span>
                            </button>
                        @endforeach
                    </div>
                </fieldset>

                <div class="summary" aria-live="polite">
                    <div class="d-flex flex-column gap-1">
                        <span class="label-caps" style="letter-spacing:.09em">Your selection</span>
                        <span class="summary__sku" data-sku>{{ $sku }}</span>
                        <span class="summary__code">SKU <span data-sku-code>{{ $code }}</span></span>
                    </div>
                    <div class="d-flex flex-column" style="gap:3px">
                        <span class="price" data-price>{{ $price }}</span>
                        <span class="price-note" data-price-note>{{ $priceNote }}</span>
                    </div>
                    <div @class(['avail', 'avail--order' => ! $inStock]) data-avail>
                        <span class="avail__icon">
                            <x-ui-icon name="check" :size="18" class="icon--stock" />
                            <x-ui-icon name="factory" :size="18" class="icon--order" />
                        </span>
                        <span class="d-flex flex-column" style="gap:3px">
                            <span class="avail__title" data-avail-title>{{ $inStock ? 'In stock — dispatches in 24 hours' : 'Available to order — made to your spec' }}</span>
                            <span class="avail__body" data-avail-body>{{ $inStock ? 'Held at the Mumbai plant. The marketplace links below carry this exact variant.' : ($p['custom'] ? 'Every printed run is produced for your artwork, so this is made to order. Typical lead time is 5–7 working days after proof approval.' : 'This combination is not held in stock, so we produce it for you. Enquire for lead time and pricing — typically 5–7 working days.') }}</span>
                        </span>
                    </div>
                </div>

                <x-cta-block :marketplaces="$p['marketplaces']" :custom="$p['custom']" :product="$p['name']" />

                <button type="button" class="rs-btn rs-btn-spec" data-enquire data-product="{{ $p['name'] }}" data-spec-from-page>
                    <x-ui-icon name="ruler" :size="18" /> Get an exact quote for this spec
                </button>
            </div>
        </div>
    </div>

    <section class="sec sec--subtle sec--tight">
        <div class="wrap spec-split">
            <div>
                <h2 class="rs-h2 rs-h2--sm">Technical specification</h2>
                <p class="body-copy" style="max-width:62ch">Figures below are for the selected variant. Tensile and peel are checked per production batch; the certificate ships with volume orders on request.</p>
                <div class="table-wrap">
                    <table class="spec-table">
                        <caption>Selected variant — <span data-spec-caption>{{ collect($d)->except('Colour')->values()->implode(' · ') }}</span></caption>
                        <tbody>
                            @foreach ($p['specs'] as [$k, $v])
                                <tr><th scope="row">{{ $k }}</th><td data-template="{{ $v }}">{{ $render($v) }}</td></tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="downloads">
                    @foreach ([['Technical data sheet', 'PDF · 240 KB'], ['Adhesive compliance statement', 'PDF · 180 KB']] as [$label, $meta])
                        <button type="button" class="download" data-enquire data-product="{{ $p['name'] }}" data-note="Please send the {{ strtolower($label) }} for {{ $p['name'] }}.">
                            <x-ui-icon name="file-text" :size="17" /> {{ $label }} <small>{{ $meta }}</small>
                        </button>
                    @endforeach
                </div>
            </div>

            <div>
                @if ($p['duty'] && isset($p['axes']['Micron']))
                    <h2 class="rs-h2 rs-h2--sm">Duty and thickness</h2>
                    <p class="body-copy">Weigh a full carton, then read across. The row matching your current selection is marked.</p>
                    <div class="duty">
                        @foreach (config('rashee.duty_matrix') as $m)
                            <div @class(['duty__row', 'is-on' => in_array($d['Micron'], $m['bands'])]) data-bands="{{ implode('|', $m['bands']) }}">
                                <div class="duty__top">
                                    <span class="duty__dot" aria-hidden="true"></span>
                                    <span class="duty__name"><strong>{{ $m['duty'] }}</strong><span>{{ $m['weight'] }}</span></span>
                                    <span class="duty__micron">{{ $m['micron'] }}</span>
                                </div>
                                <div class="duty__bottom">
                                    <span class="duty__pattern">{{ $m['pattern'] }}</span>
                                    <span class="duty__tag duty__tag--off">{{ $m['tag'] }}</span>
                                    <span class="duty__tag duty__tag--on">Your selection</span>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <h2 class="rs-h2 rs-h2--sm">How to choose</h2>
                    <div class="advice">
                        @foreach (config('rashee.choose_guidance') as $g)
                            <div class="advice__card">
                                <strong><x-ui-icon :name="$g['icon']" :size="18" /> {{ $g['title'] }}</strong>
                                <span>{{ $g['body'] }}</span>
                            </div>
                        @endforeach
                    </div>
                @endif
                <div class="print-card">
                    <span class="print-card__title">Print this line with your logo, from one {{ $p['unit'] === 'bag' ? 'bag' : 'box' }}</span>
                    <p>Up to three spot colours{{ $p['strap'] ? ' along the strap' : ' on tan or milky white film' }}. Send artwork as PDF, AI or CDR with fonts outlined and we return a digital proof before mounting a cylinder.</p>
                    <button type="button" class="rs-btn rs-btn--accent" data-enquire data-product="{{ $p['name'] }}" data-spec="Custom print from 1 {{ $p['unit'] }}">
                        <x-ui-icon name="stamp" :size="18" /> Start a custom print enquiry
                    </button>
                </div>
            </div>
        </div>
    </section>

    <section class="sec sec--tight">
        <div class="wrap d-flex flex-column gap-3">
            <h2 class="rs-h2 rs-h2--sm">Questions we get on this line</h2>
            <div class="faq-grid">
                @foreach ($p['faqs'] as [$q, $a])
                    <div class="faq"><h3>{{ $q }}</h3><p>{{ $a }}</p></div>
                @endforeach
            </div>
        </div>
    </section>

    @if ($related->isNotEmpty())
        <section class="sec sec--subtle sec--tight">
            <div class="wrap d-flex flex-column" style="gap:18px">
                <div class="d-flex flex-column" style="gap:6px">
                    <span class="eyebrow">Also specified for this load</span>
                    <h2 class="rs-h2 rs-h2--sm">Related lines</h2>
                </div>
                <div class="results__grid related">
                    @foreach ($related as $r)
                        <x-product-card :product="$r" />
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    <x-slot:actions>
        <div class="float-cta">
            <a class="float-cta__wa" href="{{ \App\Support\Site::whatsapp('Hello Rashee, I have a question about '.$p['name'].'.') }}" aria-label="Chat with a specialist on WhatsApp"><x-ui-icon name="message-circle" :size="20" /></a>
            <button type="button" class="rs-btn rs-btn--primary" data-enquire data-product="{{ $p['name'] }}" data-spec-from-page><x-ui-icon name="ruler" :size="18" /> Instant Spec Quote</button>
        </div>
        <div class="sticky-buy">
            <div class="sticky-buy__info">
                <strong data-price>{{ $price }}</strong>
                <span data-sku>{{ $sku }}</span>
            </div>
            <div class="action-bar">
                <a href="{{ \App\Support\Site::whatsapp('Hello Rashee, I have a question about '.$p['name'].'.') }}" data-whatsapp><x-ui-icon name="message-circle" :size="18" /> WhatsApp</a>
                <button type="button" data-enquire data-product="{{ $p['name'] }}" data-spec-from-page><x-ui-icon name="ruler" :size="18" /> Enquire for this spec</button>
            </div>
        </div>
    </x-slot:actions>
</x-layouts.app>
