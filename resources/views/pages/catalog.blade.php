{{-- Catalog.dc.html — filtering runs client-side (public/js/rashee.js); every line is rendered so the page works without JS. --}}
@php
    $filters = config('rashee.filters');
    $swatches = config('rashee.swatches');
    $counts = $products->countBy('category')->merge($products->countBy('application'));
@endphp
<x-layouts.app title="Packaging Products" description="Every tape and strap Rashee Enterprises makes, with the spec stated up front: BOPP, masking, filament and polypropylene strapping, printable from one box.">
    <div class="page-head">
        <div class="wrap page-head__inner">
            <nav class="crumbs" aria-label="Breadcrumb">
                <a href="{{ route('home') }}">Home</a><span aria-hidden="true">/</span><span aria-current="page">Packaging Products</span>
            </nav>
            <h1 class="rs-h1 rs-h1--page">Every tape and strap we make, with the spec stated up front</h1>
            <p class="rs-lead rs-lead--page">Nine stock lines across BOPP, masking, filament and polypropylene strapping. Filter by thickness, width or what you are sealing. Every line can be custom printed from one box, whether or not it is listed on a marketplace.</p>
        </div>
    </div>

    <div class="wrap catalog" data-catalog>
        {{-- Mobile controls --}}
        <div class="filter-bar d-lg-none">
            <div class="filter-bar__btns">
                <button type="button" class="rs-btn rs-btn--outline" data-bs-toggle="offcanvas" data-bs-target="#filters" aria-controls="filters">
                    <x-ui-icon name="sliders-horizontal" :size="18" /> Filter <span class="count-badge" data-active-count></span>
                </button>
                <span class="sort-m">
                    <label class="visually-hidden" for="sort-m">Sort products</label>
                    <x-ui-icon name="arrow-up-down" :size="18" />
                    <select id="sort-m" class="select" data-sort>
                        <option value="specified">Most specified</option>
                        <option value="thickness">Thickness, low to high</option>
                        <option value="price">Price, low to high</option>
                        <option value="width">Width, narrow to wide</option>
                    </select>
                </span>
            </div>
            <div class="active-pills" data-active-pills></div>
            <span class="results__line" aria-live="polite"><span data-result-line>{{ $products->count() }} of {{ $products->count() }} stock lines · every line printable from 1 box</span></span>
        </div>

        {{-- Filter rail: inline on desktop, bottom drawer on mobile --}}
        <aside class="rail offcanvas-lg offcanvas-bottom" tabindex="-1" id="filters" aria-labelledby="filters-title">
            <div class="rail__head">
                <h2 class="rail__title m-0" id="filters-title">Filters</h2>
                <span class="count-badge d-lg-none" data-active-count></span>
                <span class="spacer"></span>
                <button type="button" class="link-btn d-none d-lg-inline" data-clear>Clear all</button>
                <button type="button" class="icon-btn d-lg-none" data-bs-dismiss="offcanvas" data-bs-target="#filters" aria-label="Close filters"><x-ui-icon name="x" :size="20" /></button>
            </div>
            <div class="active-pills" data-active-pills></div>

            @foreach ($filters as $title => $group)
                @php $key = strtolower($title); @endphp
                <fieldset class="fgroup">
                    <legend>{{ $title }}</legend>
                    <span class="fgroup__help">{{ $group['help'] }}</span>
                    @if ($group['type'] === 'list')
                        <div class="flist">
                            @foreach ($group['options'] as $opt)
                                <button type="button" class="fcheck" data-filter="{{ $key }}" data-value="{{ $opt }}" aria-pressed="false">
                                    <span class="fcheck__box"><x-ui-icon name="check" :size="14" /></span>
                                    <span class="fcheck__label">{{ $opt }}</span>
                                    <span class="fcheck__count">{{ $counts[$opt] ?? 0 }}</span>
                                </button>
                            @endforeach
                        </div>
                    @else
                        <div class="fchips">
                            @foreach ($group['options'] as $opt)
                                <button type="button" class="fchip" data-filter="{{ $key }}" data-value="{{ $opt }}" aria-pressed="false">
                                    @if ($key === 'colour')<span class="swatch" style="background:{{ $swatches[$opt] }}"></span>@endif
                                    <x-ui-icon name="check" :size="14" />
                                    {{ $opt }}
                                </button>
                            @endforeach
                        </div>
                    @endif
                </fieldset>
            @endforeach

            <div class="spec-help d-none d-lg-flex">
                <span class="spec-help__title">Cannot find your spec?</span>
                <p>We slit to any width between 12 and 72mm and print from one box. Send the carton weight and we will specify it.</p>
                <button type="button" class="rs-btn rs-btn--accent" data-enquire><x-ui-icon name="ruler" :size="17" /> Ask for a spec</button>
            </div>

            <div class="filter-drawer__foot d-lg-none">
                <button type="button" class="rs-btn rs-btn--outline" data-clear>Clear all</button>
                <button type="button" class="rs-btn rs-btn--primary flex-grow-1" data-bs-dismiss="offcanvas" data-bs-target="#filters" data-apply>Show {{ $products->count() }} lines</button>
            </div>
        </aside>

        <div class="results">
            <div class="results__bar d-none d-lg-flex">
                <span class="results__line" aria-live="polite">
                    <x-ui-icon name="loader-circle" :size="17" />
                    <span data-result-line>{{ $products->count() }} of {{ $products->count() }} stock lines · every line printable from 1 box</span>
                </span>
                <span class="spacer"></span>
                <label class="sort" for="sort-d">Sort by</label>
                <select id="sort-d" class="select" data-sort>
                    <option value="specified">Most specified</option>
                    <option value="thickness">Thickness, low to high</option>
                    <option value="price">Price, low to high</option>
                    <option value="width">Width, narrow to wide</option>
                </select>
            </div>

            <div class="results__grid" data-results>
                @foreach ($products as $i => $p)
                    <x-product-card :product="$p" :filters="true" data-order="{{ $i }}" />
                @endforeach
            </div>

            <div class="empty" hidden data-empty>
                <span class="empty__icon"><x-ui-icon name="factory" :size="24" /></span>
                <span class="empty__title">Can't find your spec? We manufacture to order</span>
                <p>Nothing is stocked in that exact combination, which is not the same as unavailable. Narrow slits and unusual thickness and width pairs are produced per order rather than held on the shelf. Send the combination you need and we will confirm feasibility, lead time and price.</p>
                <div class="btn-row">
                    <button type="button" class="rs-btn rs-btn--primary rs-btn--md" data-enquire data-spec-from-filters><x-ui-icon name="ruler" :size="18" /> Enquire for this spec</button>
                    <a class="rs-btn rs-btn--eco rs-btn--md" href="{{ \App\Support\Site::whatsapp('Hello Rashee, I need a tape spec that is not in your catalog.') }}"><x-ui-icon name="message-circle" :size="18" /> WhatsApp a specialist</a>
                    <button type="button" class="rs-btn rs-btn--outline rs-btn--md" data-clear>Clear filters</button>
                </div>
            </div>

            <div class="guide">
                <h2 class="rs-h3 m-0">Choosing thickness by carton weight</h2>
                <div class="guide__grid">
                    @foreach (config('rashee.thickness_guide') as $g)
                        <div class="guide__card">
                            <span class="guide__band">{{ $g['band'] }}</span>
                            <span class="guide__micron">{{ $g['micron'] }}</span>
                            <span class="guide__note">{{ $g['note'] }}</span>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <section class="cta-sec">
        <div class="wrap">
            <x-cta-block />
        </div>
    </section>
</x-layouts.app>
