<x-layouts.app>
    {{-- Hero --}}
    <section class="container hero">
        <div>
            <div class="eyebrow">Manufacturing &amp; Trading</div>
            <h1 class="display-1">Empowering your business, one solution at a time</h1>
            <p class="lead">Rashee Enterprises delivers quality products and services for B2B and online sales — built on integrity, reliability, and innovation.</p>
            <div class="hero__actions">
                <a class="btn btn--primary btn--lg" href="{{ route('products') }}">
                    Explore products <x-ui-icon name="arrow-up-right" :size="20" />
                </a>
                <a class="btn btn--outline btn--lg" href="{{ route('contact') }}">
                    <x-ui-icon name="phone" :size="18" /> Talk to sales
                </a>
            </div>
            <div class="stats">
                @foreach (config('rashee.stats') as [$value, $label])
                    <div>
                        <div class="stats__value">{{ $value }}</div>
                        <div class="stats__label">{{ $label }}</div>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="hero__media">
            <div class="hero__photo">
                <img src="{{ asset('images/imagery/tower-portrait.jpg') }}" alt="Rashee facility" width="265" height="468">
            </div>
            <div class="hero__badge">
                <span class="hero__badge-icon"><x-ui-icon name="badge-check" :size="22" /></span>
                <div>
                    <strong>ISO 9001 Certified</strong>
                    <span>Quality you can trust</span>
                </div>
            </div>
        </div>
    </section>

    {{-- Values --}}
    <section class="container section" aria-label="Our values">
        <div class="grid grid--3">
            @foreach (config('rashee.values') as $value)
                <article class="card card--padded card--interactive">
                    <span class="icon-tile"><x-ui-icon :name="$value['icon']" :size="26" /></span>
                    <h3 class="heading-3">{{ $value['title'] }}</h3>
                    <p class="card__text">{{ $value['body'] }}</p>
                </article>
            @endforeach
        </div>
    </section>

    {{-- Featured products --}}
    <section class="section--band">
        <div class="container">
            <div class="section-head">
                <div>
                    <div class="eyebrow eyebrow--gold">What we offer</div>
                    <h2 class="heading-2">Featured products</h2>
                </div>
                <a class="btn btn--ghost" href="{{ route('products') }}">
                    View catalog <x-ui-icon name="arrow-right" :size="18" />
                </a>
            </div>
            <div class="grid grid--4">
                @foreach (config('rashee.featured') as $product)
                    <a class="card card--interactive" href="{{ route('products') }}">
                        <div class="card__media card__media--brand"><x-ui-icon :name="$product['icon']" :size="40" /></div>
                        <div class="card__body">
                            <x-badge :tone="$product['badge'][1]" dot>{{ $product['badge'][0] }}</x-badge>
                            <div class="product-name">{{ $product['name'] }}</div>
                            <div class="muted" style="font-size:var(--text-sm)">{{ $product['tag'] }}</div>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </section>

    {{-- About split --}}
    @include('partials.about-split')

    {{-- CTA band --}}
    @include('partials.cta-band')
</x-layouts.app>
