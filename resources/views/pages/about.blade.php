{{-- About.dc.html --}}
@php
    $contact = config('rashee.contact');
    $ethos = [
        ['indian-rupee', 'Transparent pricing', 'Slab pricing with freight stated separately, not buried in the unit rate. You see where the number comes from, and what changes if the quantity moves.', 'Freight quoted as a line item · no minimum-order surcharge · same rate card for a first order and a repeat'],
        ['ruler', 'Zero compromise on technical honesty', 'If a thinner grade holds your load, the quote says so — even though the heavier line earns us more. If a competitor suits you better, we will tell you that as well.', 'Micron recommended against carton weight · we will quote down · batch test data shared on request'],
        ['message-circle', 'Consultative problem solving', 'An enquiry reaches a specialist who has stood on the slitting floor, not a form-filler. The first question is what you are sealing, not how many boxes you want.', 'Named contact per account · reply within one working day · sample rolls before a volume commitment'],
    ];
    $qc = [
        ['Incoming resin and film', 'Every polypropylene consignment is checked for gauge consistency and haze before it reaches the coating line. Off-spec film is rejected at the gate, not blended in.', 'Gauge ±2µ · supplier COA on file'],
        ['Adhesive mix and coat weight', 'Coat weight is sampled at the start, middle and end of every run. Drift outside the band stops the line rather than producing a batch that peels differently at one end.', 'Coat weight sampled 3× per run'],
        ['Peel adhesion on steel', 'Tested against a standard steel panel at fixed temperature and humidity, because peel figures quoted without those conditions mean nothing.', '38 N per 100mm, 23°C / 50% RH'],
        ['Tensile and elongation', 'Pulled to break on a bench tester per batch. This is the figure that tells you whether a roll will snap on an automatic taping head.', '≈105 N per 25mm · 140–180% elongation'],
        ['Slit width and core tolerance', 'Width measured at three points along the roll, core roundness gauged before boxing. A millimetre out of round is what jams a machine head.', 'Width ±0.5mm · core ±1mm'],
    ];
    $downloads = [['Quality policy', 'PDF · 210 KB'], ['Adhesive compliance statement', 'PDF · 180 KB'], ['Sample batch test report', 'PDF · 340 KB']];
    $capability = [
        ['Coating', 'Water-based', 'One acrylic system across every line, so behaviour does not drift between grades.'],
        ['Thickness range', '38–60µ', 'Standard grades in 2µ steps. Below 38 and above 60 on enquiry.'],
        ['Slitting width', '12–72mm', 'Any width in the range, ±0.5mm. Non-standard widths made to order.'],
        ['Roll lengths', '40–100m', 'Stock lengths 40, 65 and 100m. Custom winds on volume orders.'],
        ['Print', '3 colours', 'Flexographic, water-based ink, on tan or milky white film.'],
        ['Strapping', '8–19mm', 'PP in 0.5–1.0mm gauge, manual and machine grade. PET on enquiry.'],
    ];
    $compliance = [
        ['Batch traceability end to end', 'Every box carries a batch number that resolves to resin lot, coating run, slitting shift and test results. Six months later we can still tell you what changed.'],
        ['Water-based adhesive declaration', 'Written statement of solvent-free coating, suitable for secondary food and pharmaceutical packaging. Not intended for direct food contact.'],
        ['Test certificates on request', 'Peel, tensile and elongation figures for your specific batch ship with volume orders, or on request for any delivery.'],
        ['Open to plant audit', 'Procurement teams and pharma quality auditors are welcome on the floor with reasonable notice. We do not stage the visit.'],
        ['GST registered, invoiced in full', 'Every order invoiced with GST and HSN codes stated. No cash pricing, no parallel rate card.'],
    ];
    $plantFacts = [['Established', 'Manufacturing and trading since 2016'], ['Coating line', 'Single water-based acrylic line'], ['Dispatch', '24 hours on stock lines, pan-India freight'], ['Visits', "Weekdays with 48 hours' notice"]];
@endphp
<x-layouts.app title="About Us & Quality Promise" description="Rashee Enterprises manufactures self-adhesive tapes and polypropylene strapping in Mumbai and sells them correctly specified — our philosophy, quality checks and plant.">
    <div class="page-head">
        <div class="wrap page-head__inner page-head__inner--about">
            <nav class="crumbs" aria-label="Breadcrumb">
                <a href="{{ route('home') }}">Home</a><span aria-hidden="true">/</span><span aria-current="page">About Us &amp; Quality Promise</span>
            </nav>
            <span class="eyebrow">About Rashee Enterprises</span>
            <h1 class="rs-h1 rs-h1--56">Wherever there are boxes, there is Rashee</h1>
            <p class="rs-lead" style="font-size:17.5px;line-height:1.62;max-width:70ch">We manufacture self-adhesive tapes and polypropylene strapping in Mumbai, and we sell them to anyone who needs them correctly specified — a two-person studio shipping forty parcels a month, and a distributor moving pallets. The company was built on a straightforward observation: most packaging is bought on price per roll, and most packaging failures are caused by that.</p>
        </div>
    </div>

    <section class="sec sec--76">
        <div class="wrap">
            <div class="split split--founder">
                <div class="d-flex flex-column gap-2">
                    <div class="eco-art__frame art-founder" role="img" aria-label="A packaging specialist at a workbench weighing a sealed carton on a bench scale, rolls of tape and a micrometer beside it.">
                        <i class="a"></i><i class="b"></i><i class="c"></i><i class="d"></i>
                        <span class="art__shot" aria-hidden="true">Documentary: specialist at a workbench weighing a sealed carton, tape rolls and a micrometer in frame.</span>
                    </div>
                    <span class="caption">alt: A packaging specialist at a workbench weighing a sealed carton on a bench scale, rolls of tape and a micrometer beside it.</span>
                </div>
                <div class="d-flex flex-column gap-3" style="min-width:0">
                    <span class="eyebrow">Founder's philosophy</span>
                    <h2 class="rs-h2 rs-h2--40">We would rather lose a sale than sell the wrong micron</h2>
                    <p class="body-copy" style="line-height:1.65">The packaging trade runs on a small dishonesty: a buyer asks for a price, gets quoted a grade, and never learns whether that grade was chosen for their carton or for the supplier's margin. Fifty micron sells better than thirty-eight. It also costs the buyer more and, on a light parcel, holds no better.</p>
                    <p class="body-copy" style="line-height:1.65">So we built the company the other way round. Tell us the carton weight and how it travels, and we will tell you what will hold it — including when that is cheaper than what you asked for. If a competitor's grade suits you better, we will say that too. It costs us the occasional order and it is the reason our accounts stay.</p>
                    <figure class="quote quote--sm m-0">
                        <span class="quote__mark" aria-hidden="true">“</span>
                        <div class="d-flex flex-column" style="gap:10px">
                            <blockquote class="quote__text m-0">Your budget, our honest execution. Your spec, exact delivery.</blockquote>
                            <figcaption class="quote__cite">The promise the company was started on</figcaption>
                        </div>
                    </figure>
                </div>
            </div>
        </div>
    </section>

    <section class="sec sec--76 sec--subtle" style="border-bottom:0">
        <div class="wrap stack">
            <div class="sec-head__copy" style="max-width:62ch">
                <span class="eyebrow">The ethos</span>
                <h2 class="rs-h2 rs-h2--40">Three commitments, stated plainly enough to be held to</h2>
            </div>
            <div class="row row-cols-1 row-cols-lg-3 g-20 g-m-12">
                @foreach ($ethos as [$icon, $title, $body, $concrete])
                    <div class="col">
                        <div class="tile tile--static tile--ethos h-100">
                            <span class="tile__icon"><x-ui-icon :name="$icon" :size="23" /></span>
                            <h3 class="tile__title tile__title--24 m-0">{{ $title }}</h3>
                            <p class="tile__body">{{ $body }}</p>
                            <span class="concrete"><span class="label-caps">What that means concretely</span><span>{{ $concrete }}</span></span>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <section class="sec sec--76" id="quality">
        <div class="wrap stack">
            <div class="sec-head__copy" style="max-width:62ch">
                <span class="eyebrow">Quality control</span>
                <h2 class="rs-h2 rs-h2--40">Five checks between resin and dispatch</h2>
                <p class="body-copy" style="line-height:1.65">Every stage below is logged against a batch number. If a roll from a delivery six months ago behaves differently to the one before it, we can tell you why rather than guess.</p>
            </div>
            <ol class="row row-cols-1 row-cols-lg-2 g-16 g-m-10 list-unstyled mb-0">
                @foreach ($qc as $i => [$title, $body, $measure])
                    <li class="col d-flex">
                        <div class="qc">
                            <span class="qc__n">{{ $i + 1 }}</span>
                            <span class="d-flex flex-column" style="gap:5px;min-width:0">
                                <strong class="step__title">{{ $title }}</strong>
                                <span class="step__body">{{ $body }}</span>
                                <span class="qc__measure">{{ $measure }}</span>
                            </span>
                        </div>
                    </li>
                @endforeach
            </ol>
            <div class="downloads">
                @foreach ($downloads as [$label, $meta])
                    <button type="button" class="download" data-enquire data-note="Please send the {{ strtolower($label) }}."><x-ui-icon name="file-text" :size="17" /> {{ $label }} <small>{{ $meta }}</small></button>
                @endforeach
            </div>
        </div>
    </section>

    <section class="sec sec--76 sec--navy">
        <div class="wrap stack">
            <div class="sec-head__copy" style="max-width:62ch">
                <span class="eyebrow eyebrow--light">Manufacturing capability</span>
                <h2 class="rs-h2 rs-h2--40 text-white">What the plant can actually do</h2>
                <p class="body-copy" style="color:var(--rs-blue-100);line-height:1.65">Stated as ranges rather than maximums, because a capability you can only hit on a good day is not a capability a buyer can plan around.</p>
            </div>
            <div class="row row-cols-2 row-cols-lg-3 g-16 g-m-10">
                @foreach ($capability as [$k, $v, $note])
                    <div class="col">
                        <div class="cap h-100">
                            <span class="cap__k">{{ $k }}</span>
                            <span class="cap__v">{{ $v }}</span>
                            <span class="cap__note">{{ $note }}</span>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <section class="sec sec--76 sec--subtle" style="border-bottom:0">
        <div class="wrap">
            <div class="split split--plant">
                <div class="d-flex flex-column gap-3" style="min-width:0">
                    <span class="eyebrow">Plant &amp; compliance</span>
                    <h2 class="rs-h2 rs-h2--40">Where it is made, and what we can document</h2>
                    <p class="body-copy" style="line-height:1.65">One plant, one coating line, one adhesive system. Buyers are welcome to visit — most procurement teams who do end up specifying against what they saw on the slitting floor rather than a data sheet.</p>
                    <ul class="compliance">
                        @foreach ($compliance as [$title, $body])
                            <li>
                                <span class="compliance__tick"><x-ui-icon name="check" :size="15" /></span>
                                <span class="d-flex flex-column" style="gap:3px;min-width:0"><strong>{{ $title }}</strong><span>{{ $body }}</span></span>
                            </li>
                        @endforeach
                    </ul>
                </div>
                <div class="d-flex flex-column" style="gap:14px">
                    <div class="panel-card">
                        <span class="label-caps" style="letter-spacing:.09em">Operational HQ &amp; plant</span>
                        <address class="plant-address">Rashee Enterprises<br>{!! collect($contact['address'])->map(fn ($l) => e($l))->implode('<br>') !!}</address>
                        <dl class="facts facts--wide">
                            @foreach ($plantFacts as [$k, $v])
                                <div><dt>{{ $k }}</dt><dd>{{ $v }}</dd></div>
                            @endforeach
                        </dl>
                        <a class="rs-btn rs-btn--outline rs-btn--48" href="{{ route('contact') }}#visit"><x-ui-icon name="map-pin" :size="17" /> Arrange a plant visit</a>
                    </div>
                    <div class="eco-art__frame art-plant" role="img" aria-label="Rolls of finished tape on a slitting-machine outfeed inside a manufacturing plant, cool overhead lighting.">
                        <i class="a"></i><i class="b"></i>
                        <span class="art__shot" aria-hidden="true">Documentary: finished rolls on the slitting-machine outfeed, cool overhead light.</span>
                    </div>
                    <span class="caption">alt: Rolls of finished tape on a slitting-machine outfeed inside a manufacturing plant, cool overhead lighting.</span>
                </div>
            </div>
        </div>
    </section>

    <section class="sec sec--76">
        <div class="wrap"><x-cta-block /></div>
    </section>
</x-layouts.app>
