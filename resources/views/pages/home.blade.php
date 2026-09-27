{{-- Homepage.dc.html --}}
@php
    use App\Support\Catalog;
    $families = config('rashee.families');
    $counts = collect($families)->countBy('key')->put('All', count($families));
@endphp
<x-layouts.app>
    {{-- Hero --}}
    <section class="hero">
        <div class="wrap hero__grid">
            <div class="hero__copy">
                <span class="eyebrow">Industrial tapes &amp; strapping · Made in Mumbai</span>
                <h1 class="rs-h1">The right micron for your carton, at a price that fits your order.</h1>
                <p class="rs-lead">Rashee Enterprises manufactures BOPP tapes, masking and filament tapes, and PP strapping patty — with custom brand printing from a single box. Buy a few packs online, or send us a spec and we will quote it honestly.</p>
                <div class="hero__ctas">
                    <a class="rs-btn rs-btn--primary" href="{{ route('products.index') }}">Explore the Catalog <x-ui-icon name="arrow-right" :size="19" /></a>
                    <a class="rs-btn rs-btn--accent" href="{{ route('custom') }}"><x-ui-icon name="stamp" :size="19" /> Custom Print from 1 Box</a>
                </div>
                <div class="trust">
                    @foreach (config('rashee.trust') as [$icon, $label])
                        <span><x-ui-icon :name="$icon" :size="17" /> {{ $label }}</span>
                    @endforeach
                </div>
            </div>
            <div class="hero__art">
                @include('partials.hero-art')
                <span class="caption">Illustration — not a photograph. Hero composition drawn in SVG: carton, printed seam, strapping band, tape roll.</span>
            </div>
        </div>
    </section>

    {{-- Promise --}}
    <section class="sec" aria-label="Our packaging promise">
        <div class="wrap stack">
            <figure class="quote m-0">
                <span class="quote__mark" aria-hidden="true">“</span>
                <div class="d-flex flex-column gap-2">
                    <blockquote class="quote__text m-0">Wherever there are boxes, there is Rashee. A small buyer and a national distributor both deserve the correct micron.</blockquote>
                    <figcaption class="quote__cite">The universal packaging promise — how we quote, every time</figcaption>
                </div>
            </figure>
            <div class="row row-cols-1 row-cols-lg-3 g-20 g-m-12">
                @foreach (config('rashee.promises') as $p)
                    <div class="col">
                        <div class="tile h-100">
                            <span class="tile__icon"><x-ui-icon :name="$p['icon']" :size="22" /></span>
                            <h2 class="tile__title m-0">{{ $p['title'] }}</h2>
                            <p class="tile__body">{{ $p['body'] }}</p>
                            <span class="tile__proof">{{ $p['proof'] }}</span>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- Featured product lines --}}
    <section class="sec sec--subtle" data-family-tabs>
        <div class="wrap stack">
            <div class="sec-head">
                <div class="sec-head__copy">
                    <span class="eyebrow">Featured product lines</span>
                    <h2 class="rs-h2">Four families, one adhesive standard</h2>
                    <p class="body-copy">Every line is made on the same water-based acrylic system we ship to pharma clients. Filter by what you are sealing, or open a line to pick micron and width.</p>
                </div>
                <a class="rs-btn rs-btn--outline" href="{{ route('products.index') }}">Full catalog <x-ui-icon name="arrow-right" :size="17" /></a>
            </div>

            <div class="tabs" role="group" aria-label="Filter product lines">
                @foreach (config('rashee.family_tabs') as [$key, $label])
                    <button type="button" class="tab" data-tab="{{ $key }}" aria-pressed="{{ $key === 'All' ? 'true' : 'false' }}">
                        <x-ui-icon name="check" :size="15" />
                        {{ $label }}
                        <span class="tab__count">{{ $counts[$key] ?? 0 }}</span>
                    </button>
                @endforeach
            </div>

            <div class="carousel-wrap">
                <div class="grid-4 carousel">
                    @foreach ($families as $f)
                        <x-product-card :product="$f + ['card_name' => $f['name'], 'price' => $f['price'], 'category' => '']" data-family="{{ $f['key'] }}" />
                    @endforeach
                </div>
                <div class="carousel-foot">
                    <span data-carousel-hint>{{ count($families) }} of {{ count($families) }} lines · swipe for more</span>
                    <a class="rs-btn rs-btn--outline" href="{{ route('products.index') }}">Full catalog <x-ui-icon name="arrow-right" :size="18" /></a>
                </div>
            </div>
        </div>
    </section>

    {{-- Low-MOQ custom printing --}}
    <section class="sec sec--gold">
        <div class="wrap stack">
            <div class="sec-head">
                <div class="sec-head__copy">
                    <span class="eyebrow eyebrow--gold">The low-MOQ advantage</span>
                    <h2 class="rs-h2">Custom brand printing, from one box</h2>
                    <p class="body-copy body-copy--dark">Most printers ask for 10 to 25 boxes before they will mount a cylinder. We start at one box of tape, or one bag of strapping patty — so a first order can carry your logo.</p>
                </div>
            </div>
            <div class="moq-split">
                <ol class="roadmap">
                    @foreach (config('rashee.print_steps') as $i => $s)
                        @include('partials.step', ['n' => $i + 1, 's' => $s])
                    @endforeach
                </ol>
                @include('partials.box-math', ['cta' => true])
            </div>
        </div>
    </section>

    {{-- Industries --}}
    <section class="sec">
        <div class="wrap stack">
            <div class="sec-head">
                <div class="sec-head__copy">
                    <span class="eyebrow">Industries we secure</span>
                    <h2 class="rs-h2">Different loads need different tack</h2>
                    <p class="body-copy">A frozen-food carton and a textile bale fail in opposite ways. Each industry page carries the micron, adhesive and strap gauge we recommend, and why.</p>
                </div>
                <a class="rs-btn rs-btn--outline" href="{{ route('industries') }}">All industries <x-ui-icon name="arrow-right" :size="17" /></a>
            </div>
            <div class="row row-cols-2 row-cols-lg-3 g-18 g-m-10">
                @foreach (config('rashee.industries') as $ind)
                    <div class="col">
                        @include('partials.industry-tile', ['ind' => $ind, 'href' => route('industries').'#'.$ind['slug']])
                    </div>
                @endforeach
            </div>
            <a class="rs-btn rs-btn--outline rs-btn--md d-lg-none" href="{{ route('industries') }}">All industries <x-ui-icon name="arrow-right" :size="18" /></a>
        </div>
    </section>

    {{-- Going green --}}
    <section class="sec sec--eco">
        <div class="wrap">
            <div class="eco-split">
                <div class="eco-split__copy">
                    <span class="pill-eco pill-eco--lg"><x-ui-icon name="leaf" :size="15" /> Going green</span>
                    <h2 class="rs-h2">Solvent-free adhesive, recyclable strapping, thinner film where the load allows</h2>
                    <p class="body-copy body-copy--dark">Sustainability here is a manufacturing decision, not a label. Our adhesive is water-based, so there is no solvent recovery to manage. Our PP strapping replaces steel on most pallet loads and goes back into the recycling stream. Where a carton is light, we will recommend 38 micron instead of selling you 50.</p>
                    <ul class="checks">
                        @foreach (config('rashee.eco_points') as $e)
                            <li><span><x-ui-icon name="check" :size="15" /></span><span><strong>{{ $e['lead'] }}</strong> {{ $e['body'] }}</span></li>
                        @endforeach
                    </ul>
                    <a class="rs-btn rs-btn--eco align-self-start" href="{{ route('sustainability') }}">Read our sustainability approach <x-ui-icon name="arrow-right" :size="19" /></a>
                </div>
                @include('partials.strap-art')
            </div>
        </div>
    </section>
</x-layouts.app>
