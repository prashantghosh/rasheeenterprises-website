{{-- Sustainability.dc.html --}}
@php
    $metrics = [
        ['droplets', 'Zero', 'Solvent in the coating line', 'Water-based acrylic only, so no VOC capture, no recovery system, no solvent inventory on site.'],
        ['leaf', '100%', 'PP strapping recyclable', 'Polypropylene goes back into the stream. Steel banding on the same pallet does not, and rust-marks the load.'],
        ['scale', '~25%', 'Film saved by right-sizing', 'Moving an over-specified 50µ mailer seal to the 38µ grade that holds it. Same seam strength, less polypropylene.'],
        ['package', '1 box', 'Minimum order', 'A low minimum is a waste measure. Buying a year of printed stock on a volume guess is how packaging gets written off.'],
    ];
    $adhesive = [
        ['droplets', 'No solvent to recover', 'Solvent coating needs capture and incineration to run cleanly, and that system is only as good as its maintenance. Water-based acrylic removes the failure mode rather than managing it.', 'Zero VOC stack on the coating line'],
        ['package', 'Nothing left in the carton', 'Solvent residue carries a faint smell into a sealed box for days, which matters for food and pharma secondary packaging. Acrylic cures without it.', 'Suitable for secondary food packaging'],
        ['thermometer', 'Consistent across batches', 'A single adhesive system means peel and tack behave the same from one delivery to the next, so a validated sealing line does not need requalifying.', 'Peel and tensile checked per batch'],
    ];
    $efficiency = [
        ['We quote the thinner grade when it holds.', 'If 38 micron seals your carton, that is what the quote says — even though the 50 micron line earns us more per box.'],
        ['Burst strength belongs to the board.', 'Past the point where the bond beats the fibreboard\'s tear resistance, extra film moves the failure point nowhere.'],
        ['One strip beats three thin ones.', 'Pattern matters more than thickness on medium cartons. An H-pattern in the right grade outperforms a heavier single strip.'],
        ['Low minimums cut write-offs.', 'One box means seasonal artwork does not become a year of obsolete stock in a warehouse corner.'],
    ];
    $compare = [
        ['micron' => '38µ', 'tag' => 'What the load needs', 'on' => true,
            'note' => 'Seals the mailer with a single centre strip. The fibreboard tears before this bond does, so the seam is as strong as the box allows.',
            'bars' => [['Film used', '1.0×', 62, '#247651'], ['Seam strength', 'Board limit', 100, '#247651'], ['Cost per carton', '1.0×', 58, '#247651']]],
        ['micron' => '50µ', 'tag' => 'What often gets sold', 'on' => false,
            'note' => 'Also seals the mailer. Uses about a quarter more polypropylene and costs more per carton, with the failure point unchanged — the board still gives way first.',
            'bars' => [['Film used', '1.26×', 82, '#a77d31'], ['Seam strength', 'Board limit', 100, '#8f9aa3'], ['Cost per carton', '1.31×', 78, '#a77d31']]],
    ];
    $strapping = [
        ['leaf', 'Recyclable, and actually recycled', 'Polypropylene strapping is accepted by standard recycling streams. Steel banding goes to scrap at best, and to landfill on mixed waste.'],
        ['truck', 'A tenth of the freight weight', 'For the same pallet load, PP weighs a fraction of steel. That comes off the shipping weight of every consignment you send.'],
        ['droplets', 'No rust bleed', 'Steel marks fabric bales and painted surfaces in humid transit. PP does not stain the goods it is holding.'],
        ['wrench', 'Safer to cut', 'Steel banding recoils under tension and causes a large share of warehouse hand injuries. PP releases without snapping back.'],
    ];
    $waste = [
        ['package', 'Cores back into the winding line', 'Returned cardboard cores are inspected and reused rather than pulped. Outer cartons go back out on local dispatch.'],
        ['scale', 'Slitting trim reground on site', 'Edge trim from slitting is collected by width and reground for non-critical extrusion rather than baled as mixed waste.'],
        ['ruler', 'Proof before cylinder', 'Every printed run is proofed digitally first. Catching a repeat-length error on screen saves a full box of misprinted film.'],
        ['clock', 'Batch sizing to order', 'We coat against confirmed orders rather than building speculative stock that ages out of adhesive spec on the shelf.'],
    ];
    $roadmap = [
        ['In progress', '2026', false, 'Post-industrial recycled content in BOPP film', 'Trialling 20 per cent post-industrial regrind in the backing film. Holding tensile within spec is the blocker — two of four trial batches failed elongation, so this is not shipping yet.'],
        ['In progress', '2026', false, 'Core take-back on volume accounts', 'Returned cardboard cores already go back into the winding line. Extending collection to distributor accounts needs reverse logistics we do not yet run economically.'],
        ['Committed', '2027', false, 'Solar on the coating-line roof', 'Sized to cover roughly a third of coating-line draw during daylight hours. Approved and budgeted; installation follows the plant expansion.'],
        ['Done', '2025', true, 'Solvent eliminated from the coating line', 'The line runs water-based acrylic exclusively. There is no solvent inventory on site, so there is no recovery system to maintain and no VOC stack to monitor.'],
    ];
@endphp
<x-layouts.app title="Sustainability & Vision" description="Water-based adhesive, recyclable PP strapping and right-sized film — how Rashee Enterprises approaches sustainability, and what is still on the roadmap.">
    <div class="page-hero page-hero--eco">
        <div class="wrap page-hero__grid page-hero__grid--eco">
            <div class="page-hero__copy">
                <nav class="crumbs" aria-label="Breadcrumb">
                    <a href="{{ route('home') }}">Home</a><span aria-hidden="true">/</span><span aria-current="page">Sustainability &amp; Vision</span>
                </nav>
                <span class="pill-eco pill-eco--lg"><x-ui-icon name="leaf" :size="15" /> Going green</span>
                <h1 class="rs-h1 rs-h1--52">Sustainability here is a manufacturing decision, not a label</h1>
                <p class="rs-lead" style="color:var(--rs-neutral-800);max-width:58ch">Three things determine the environmental cost of a packaging tape: what is in the adhesive, what the backing is made of, and how much of it you were sold. We can speak to all three, because we coat and slit our own film. The fourth — selling you thickness you do not need — is the one most suppliers will not discuss.</p>
                <div class="hero__ctas">
                    <a class="rs-btn rs-btn--eco" href="#efficiency">Read the material-efficiency argument <x-ui-icon name="arrow-right" :size="19" /></a>
                    <button type="button" class="rs-btn rs-btn--outline rs-btn--54" data-enquire data-note="Please check whether a thinner grade would hold my carton."><x-ui-icon name="ruler" :size="18" /> Ask us to right-size a spec</button>
                </div>
            </div>
            <div class="panel-card panel-card--eco">
                <span class="label-caps" style="letter-spacing:.09em">Where the savings actually come from</span>
                @foreach ($metrics as [$icon, $n, $label, $note])
                    <div class="metric">
                        <span class="metric__icon"><x-ui-icon :name="$icon" :size="19" /></span>
                        <span class="d-flex flex-column" style="gap:2px;min-width:0">
                            <span class="metric__n">{{ $n }}</span>
                            <strong class="metric__label">{{ $label }}</strong>
                            <span class="metric__note">{{ $note }}</span>
                        </span>
                    </div>
                @endforeach
                <span class="small-note">Figures are our own plant measurements, not certified third-party audits. We will share the method behind any of them on request.</span>
            </div>
        </div>
    </div>

    <section class="sec sec--76">
        <div class="wrap stack">
            <div class="sec-head__copy" style="max-width:62ch">
                <span class="eyebrow">The adhesive</span>
                <h2 class="rs-h2 rs-h2--40">Water-based acrylic, because the alternative has to be recovered</h2>
                <p class="body-copy">Solvent-based adhesives coat well and cost less per kilo. They also release volatile organic compounds during coating, which then need capture and incineration, and they leave a faint solvent smell inside a sealed carton for days. Our coating line runs water-based acrylic exclusively, so there is no solvent inventory on site and no recovery system to fail.</p>
            </div>
            <div class="row row-cols-1 row-cols-lg-3 g-20 g-m-12">
                @foreach ($adhesive as [$icon, $title, $body, $proof])
                    <div class="col">
                        <div class="tile tile--static h-100">
                            <span class="tile__icon"><x-ui-icon :name="$icon" :size="22" /></span>
                            <h3 class="tile__title tile__title--22 m-0">{{ $title }}</h3>
                            <p class="tile__body">{{ $body }}</p>
                            <span class="tile__proof">{{ $proof }}</span>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <section class="sec sec--76 sec--eco" id="efficiency" style="border-bottom:1px solid #b9ddc9">
        <div class="wrap">
            <div class="split split--eff">
                <div class="eco-split__copy">
                    <span class="eyebrow" style="color:var(--eco-hover)">Material efficiency</span>
                    <h2 class="rs-h2 rs-h2--40">The greenest roll is the one you did not need</h2>
                    <p class="body-copy body-copy--dark">Over-specifying micron is the most common waste in this industry, and it is invisible because the carton still arrives sealed. A 50 micron tape on a 3 kg mailer works perfectly — it just uses about 25 per cent more polypropylene than the 38 micron grade that would have held it, at a higher price, for no gain in burst strength at the seam.</p>
                    <p class="body-copy body-copy--dark">Burst strength is a property of the carton, not the tape. Once the adhesive bond exceeds the fibreboard's own tear resistance, adding film thickness moves the failure point nowhere — the board gives way first. That threshold is what we specify against, which is why our recommendation is sometimes a thinner grade than you asked for.</p>
                    <ul class="checks">
                        @foreach ($efficiency as [$lead, $body])
                            <li><span><x-ui-icon name="check" :size="15" /></span><span><strong>{{ $lead }}</strong> {{ $body }}</span></li>
                        @endforeach
                    </ul>
                </div>
                <div class="panel-card panel-card--eco" style="gap:12px">
                    <span class="label-caps" style="letter-spacing:.09em">Same 3 kg mailer, two specifications</span>
                    @foreach ($compare as $c)
                        <div @class(['spec-compare', 'is-on' => $c['on']])>
                            <span class="d-flex align-items-center flex-wrap" style="gap:10px">
                                <span class="spec-compare__micron">{{ $c['micron'] }}</span>
                                <span class="spec-compare__tag">{{ $c['tag'] }}</span>
                            </span>
                            <span class="d-flex flex-column" style="gap:7px;padding-top:10px">
                                @foreach ($c['bars'] as [$k, $v, $pct, $colour])
                                    <span class="bar-row">
                                        <span class="bar-row__k">{{ $k }}</span>
                                        <span class="bar-row__track" role="img" aria-label="{{ $k }}: {{ $v }}"><span style="width:{{ $pct }}%;background:{{ $colour }}"></span></span>
                                        <span class="bar-row__v">{{ $v }}</span>
                                    </span>
                                @endforeach
                            </span>
                            <span class="spec-compare__note">{{ $c['note'] }}</span>
                        </div>
                    @endforeach
                    <span class="small-note">Both specifications seal the carton. Only one of them charges you for film the load never needed.</span>
                </div>
            </div>
        </div>
    </section>

    <section class="sec sec--76" id="strapping">
        <div class="wrap stack">
            <div class="sec-head__copy" style="max-width:62ch">
                <span class="eyebrow">Strapping</span>
                <h2 class="rs-h2 rs-h2--40">Polypropylene instead of steel, and it goes back into the stream</h2>
                <p class="body-copy">PP strapping is recyclable, roughly a tenth the weight of steel banding for the same pallet, and it will not rust-mark a crate or a fabric bale in monsoon transit. Where a load genuinely exceeds what PET can carry we will tell you to use steel — but on most crated freight it is specified out of habit.</p>
            </div>
            <div class="split split--strap">
                <div class="d-flex flex-column" style="gap:10px">
                    @foreach ($strapping as [$icon, $title, $body])
                        <div class="point">
                            <span class="point__icon"><x-ui-icon :name="$icon" :size="17" /></span>
                            <span class="d-flex flex-column" style="gap:4px;min-width:0">
                                <strong class="step__title">{{ $title }}</strong>
                                <span class="step__body">{{ $body }}</span>
                            </span>
                        </div>
                    @endforeach
                </div>
                @include('partials.strap-art', ['after' => true])
            </div>
        </div>
    </section>

    <section class="sec sec--76 sec--subtle" style="border-bottom:0">
        <div class="wrap stack">
            <div class="sec-head__copy" style="max-width:62ch">
                <span class="eyebrow">In the plant</span>
                <h2 class="rs-h2 rs-h2--40">Waste reduction that is boring and measurable</h2>
                <p class="body-copy">None of the practices below are novel. They are the ones that actually move tonnage, and they are all things a buyer can verify on a plant visit.</p>
            </div>
            <div class="row row-cols-1 row-cols-lg-2 g-18 g-m-12">
                @foreach ($waste as [$icon, $title, $body])
                    <div class="col">
                        <div class="waste h-100">
                            <strong><x-ui-icon :name="$icon" :size="20" /> {{ $title }}</strong>
                            <p>{{ $body }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <section class="sec sec--76 sec--navy">
        <div class="wrap stack">
            <div class="sec-head__copy" style="max-width:62ch">
                <span class="eyebrow eyebrow--light">The roadmap</span>
                <h2 class="rs-h2 rs-h2--40 text-white">What we have not done yet</h2>
                <p class="body-copy" style="color:var(--rs-blue-100)">Stating targets is easy; stating what is still unresolved is more useful to a buyer deciding whether to trust us. Each item below has a date we are working to, and we will say plainly if one slips.</p>
            </div>
            <div class="row row-cols-1 row-cols-lg-2 g-18 g-m-12">
                @foreach ($roadmap as [$status, $when, $done, $title, $body])
                    <div class="col">
                        <div @class(['roadmap-card h-100', 'is-done' => $done])>
                            <span class="d-flex align-items-center flex-wrap" style="gap:10px">
                                <span class="roadmap-card__status">{{ $status }}</span>
                                <span class="roadmap-card__when">{{ $when }}</span>
                            </span>
                            <strong>{{ $title }}</strong>
                            <p>{{ $body }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <section class="sec sec--76">
        <div class="wrap"><x-cta-block /></div>
    </section>

    <x-slot:actions>
        @php $wa = \App\Support\Site::whatsapp('Hello Rashee, I would like help right-sizing my tape spec.'); @endphp
        <div class="float-cta">
            <a class="float-cta__wa" href="{{ $wa }}" aria-label="Chat with a specialist on WhatsApp"><x-ui-icon name="message-circle" :size="20" /></a>
            <button type="button" class="rs-btn rs-btn--primary" data-enquire><x-ui-icon name="ruler" :size="18" /> Instant Spec Quote</button>
        </div>
        <div class="action-bar">
            <a href="{{ $wa }}"><x-ui-icon name="message-circle" :size="18" /> Chat on WhatsApp</a>
            <button type="button" data-enquire data-note="Please check whether a thinner grade would hold my carton."><x-ui-icon name="ruler" :size="18" /> Right-size my spec</button>
        </div>
    </x-slot:actions>
</x-layouts.app>
