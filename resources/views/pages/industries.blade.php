{{-- Industries.dc.html — sector tabs switch the detail panel client-side; each sector also has its own #anchor. --}}
@php
    $sectors = config('rashee.industries');
    $duty = [
        ['band' => 'Light duty · under 5 kg', 'micron' => '38–40µ', 'note' => 'Mailers, apparel and light e-commerce parcels. Thicker film here is money spent on nothing.', 'pattern' => 'Single centre strip'],
        ['band' => 'Medium duty · 5–18 kg', 'micron' => '42–45µ', 'note' => 'Standard FMCG, pharma and general cartons, single or double taped along the seam.', 'pattern' => 'Centre strip, H-pattern if stacked'],
        ['band' => 'Heavy duty · over 18 kg', 'micron' => '50µ and above', 'note' => 'Heavy or cold-chain loads on recycled fibreboard, where the flap wants to lift.', 'pattern' => 'H-pattern, add strapping over 25 kg'],
    ];
@endphp
<x-layouts.app title="Industries We Secure" description="What Rashee Enterprises specifies for pharma, e-commerce, cold storage, FMCG, textiles and heavy engineering — and why.">
    <div class="page-hero page-hero--navy">
        <div class="wrap page-hero__copy page-hero__single">
            <nav class="crumbs crumbs--light" aria-label="Breadcrumb">
                <a href="{{ route('home') }}">Home</a><span aria-hidden="true">/</span><span aria-current="page">Industries We Secure</span>
            </nav>
            <span class="eyebrow eyebrow--light">Industries we secure</span>
            <h1 class="rs-h1 rs-h1--56 text-white">Different loads fail in different ways</h1>
            <p class="rs-lead" style="color:var(--rs-blue-100);max-width:62ch">A frozen-food carton lifts at the flap. A textile bale cuts through its own strap. A pharma case has to show it was never opened. Below is what we specify for each, and the reasoning behind it — not a list of markets we happen to sell into.</p>
        </div>
    </div>

    <section class="sec sec--72">
        <div class="wrap stack">
            <div class="sec-head__copy" style="max-width:56ch">
                <span class="eyebrow">Start here</span>
                <h2 class="rs-h2 rs-h2--40">Weigh a full carton before anything else</h2>
                <p class="body-copy">Industry matters less than weight and temperature. This is the same matrix our specialists work from when they answer an enquiry.</p>
            </div>
            <div class="row row-cols-1 row-cols-lg-3 g-18 g-m-12">
                @foreach ($duty as $d)
                    <div class="col">
                        <div class="duty-card h-100">
                            <span class="guide__band">{{ $d['band'] }}</span>
                            <span class="duty-card__micron">{{ $d['micron'] }}</span>
                            <span class="guide__note">{{ $d['note'] }}</span>
                            <span class="duty-card__pattern">{{ $d['pattern'] }}</span>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <section class="sec sec--72 sec--subtle" id="sectors" data-sectors>
        <div class="wrap stack">
            <div class="d-flex flex-column" style="gap:20px">
                <div class="sec-head__copy">
                    <span class="eyebrow">Six sectors</span>
                    <h2 class="rs-h2 rs-h2--40">What we specify, and why</h2>
                </div>
                <div class="tabs tabs--sectors" role="tablist" aria-label="Choose a sector">
                    @foreach ($sectors as $i => $s)
                        <button type="button" class="tab" role="tab" id="tab-{{ $s['slug'] }}" aria-controls="{{ $s['slug'] }}" aria-selected="{{ $i === 0 ? 'true' : 'false' }}" aria-pressed="{{ $i === 0 ? 'true' : 'false' }}" data-sector="{{ $s['slug'] }}">
                            <x-ui-icon :name="$s['icon']" :size="17" class="tab__sector-icon" />
                            <span class="d-none d-lg-inline">{{ $s['name'] }}</span><span class="d-lg-none">{{ strtok($s['name'], ' ') }}</span>
                        </button>
                    @endforeach
                </div>
            </div>

            @foreach ($sectors as $i => $s)
                <div class="sector" id="{{ $s['slug'] }}" role="tabpanel" aria-labelledby="tab-{{ $s['slug'] }}" @if ($i > 0) hidden @endif>
                    <div class="d-flex flex-column gap-2">
                        <div class="sector__art" role="img" aria-label="{{ $s['alt'] }}" style="background:linear-gradient(150deg,{{ $s['tone'] }} 0%,#eef2f5 60%,#d3e9f6 100%)">
                            <i class="a"></i><i class="b"></i>
                            <span class="art__shot" aria-hidden="true">{{ $s['shot'] }}</span>
                        </div>
                        <span class="caption">alt: {{ $s['alt'] }}</span>
                    </div>
                    <div class="d-flex flex-column gap-3" style="min-width:0">
                        <div class="d-flex flex-column gap-2">
                            <span class="sector__pill"><x-ui-icon :name="$s['icon']" :size="14" /> {{ $s['name'] }}</span>
                            <h3 class="sector__title">{{ $s['headline'] }}</h3>
                            <p class="body-copy">{{ $s['body'] }}</p>
                        </div>
                        <div class="sector__specs">
                            @foreach ($s['specs'] as [$k, $v])
                                <span><span class="label-caps">{{ $k }}</span><strong>{{ $v }}</strong></span>
                            @endforeach
                        </div>
                        <div class="sector__fail">
                            <span class="label-caps" style="font-size:12px;letter-spacing:.08em">Where it usually goes wrong</span>
                            @foreach ($s['failures'] as $f)
                                <span class="sector__fail-item">{{ $f }}</span>
                            @endforeach
                        </div>
                        <div class="btn-row">
                            <button type="button" class="rs-btn rs-btn--primary rs-btn--50" data-enquire data-product="{{ $s['name'] }}" data-spec="{{ collect($s['specs'])->map(fn ($x) => $x[0].': '.$x[1])->implode(' · ') }}"><x-ui-icon name="ruler" :size="18" /> Enquire for this application</button>
                            <a class="rs-btn rs-btn--outline rs-btn--50" href="{{ route('products.index', $s['filter']) }}">View recommended lines <x-ui-icon name="arrow-right" :size="17" /></a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>

    <section class="sec sec--72">
        <div class="wrap stack">
            <div class="sec-head__copy">
                <span class="eyebrow">All sectors</span>
                <h2 class="rs-h2 rs-h2--40">Every industry, at a glance</h2>
                <p class="body-copy">Tap any tile to read the full specification. This grid is the summary version — thickness, width and the one detail that matters most for each.</p>
            </div>
            <div class="row row-cols-2 row-cols-lg-3 g-18 g-m-10">
                @foreach ($sectors as $i => $s)
                    <div class="col">@include('partials.industry-tile', ['ind' => $s, 'href' => '#'.$s['slug'], 'select' => true])</div>
                @endforeach
            </div>
        </div>
    </section>

    <section class="cta-sec" style="padding:72px 0;border-bottom:1px solid var(--border-subtle)">
        <div class="wrap"><x-cta-block /></div>
    </section>
</x-layouts.app>
