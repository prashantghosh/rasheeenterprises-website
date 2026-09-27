{{-- CustomBrandPrinting.dc.html --}}
@php
    $wa = \App\Support\Site::whatsapp('Hello Rashee, I would like to send artwork for custom printed tape.');
    $facts = [['1 box', 'Minimum for printed tape'], ['1 bag', 'Minimum for strapping patty'], ['3', 'Spot colours available'], ['5–7 days', 'After proof approval']];
    $steps = [
        ['title' => 'Send your artwork', 'body' => 'PDF, AI or CDR with fonts outlined, one to three spot colours. No artwork yet? Send a logo and we will set the repeat for you.', 'when' => 'Same day acknowledgement'],
        ['title' => 'We confirm the spec', 'body' => 'Micron, width and adhesive matched to your carton weight and how it ships. You get the reasoning, not just a rate.', 'when' => 'Within 1 working day'],
        ['title' => 'Approve a digital proof', 'body' => 'Repeat length, colour placement and print direction shown on the actual film before we mount a cylinder. Revisions are free at this stage.', 'when' => '1–2 working days'],
        ['title' => 'Print and dispatch', 'body' => 'Printed, slit to your width and boxed. Reorders skip straight to production on the same cylinder, so repeat runs are faster.', 'when' => '5–7 working days'],
    ];
    $options = [
        ['name' => 'One colour', 'tag' => 'Fastest turnaround', 'bg' => 'linear-gradient(140deg,#fdf6e4 0%,#e8eef2 100%)', 's1' => '#184b66', 's2' => null,
            'alt' => 'A tan tape roll printed with a single dark repeated wordmark.', 'shot' => 'Studio: single-colour wordmark repeat on tan film, flat top light.',
            'body' => 'A wordmark or a simple mark in one ink. Cleanest option on tan film and the quickest to proof, because there is no registration between colours to hold.'],
        ['name' => 'Two colour', 'tag' => 'Most ordered', 'bg' => 'linear-gradient(140deg,#fdf6e4 0%,#eef8fc 100%)', 's1' => '#f3d170', 's2' => '#184b66',
            'alt' => 'A tan tape roll printed with a two-colour logo repeated along the film.', 'shot' => 'Studio: two-colour logo repeat on tan film, slight roll curvature.',
            'body' => 'Logo plus an accent, or a mark with a contrasting strapline. Registration is held to within 0.5mm, which is enough for a logo but not for fine gradients.'],
        ['name' => 'Three colour', 'tag' => 'Full brand palette', 'bg' => 'linear-gradient(140deg,#eef8fc 0%,#e8eef2 100%)', 's1' => '#41a9dc', 's2' => '#247651',
            'alt' => 'A milky white tape roll printed with a three-colour brand pattern.', 'shot' => 'Studio: three-colour repeat on milky white film, raking side light.',
            'body' => 'The full mark on milky white film, which holds lighter brand colours that disappear on tan. Add one to two days for proofing across three cylinders.'],
    ];
    $artwork = [
        ['Vector, not a screenshot.', 'PDF, AI or CDR with fonts outlined. A 300dpi PNG can work for a simple mark, but edges soften on film.'],
        ['Spot colours, named.', 'Give us Pantone references if you have them. We match to the closest achievable ink and show it on the proof before printing.'],
        ['Leave the repeat to us.', 'Repeat length depends on cylinder circumference and roll width. Send the mark; we will lay out the run.'],
        ['Tell us the film.', 'Tan hides light inks and reads warm. Milky white holds pastels and light blues. If you are unsure, send both and we will proof on the better one.'],
    ];
    $faqs = [
        ['Is printed tape really available at one box?', 'Yes, and it is the same film, ink and adhesive as our largest accounts. The setup cost is priced into the quote rather than hidden behind a minimum.'],
        ['Can I reorder a smaller quantity later?', 'Yes. The cylinder stays on file, so reorders skip proofing and go straight to production — usually faster than the first run.'],
        ['How much does printing add per box?', 'It depends on width, colours and quantity, so we quote rather than publish a rate. One-colour print on 48mm adds less than most buyers expect at a single box.'],
        ['Will the print rub off in transit?', 'No. Water-based flexographic ink is cured into the film surface, not sitting on top of it. It survives handling, humidity and stacking.'],
        ['Can strapping patty be printed too?', 'Yes, from one bag, which is five boxes. Printed strapping is common for despatch marking and for discouraging tampering on bales.'],
        ['What if I need a width you do not stock?', 'We slit anything between 12 and 72mm. Non-standard widths are made to order — send the width and the quantity and we will confirm lead time.'],
    ];
@endphp
<x-layouts.app title="Custom Brand Printing" description="Custom brand printing on tape and strapping from one box — flexographic, water-based ink, up to three spot colours, 5–7 working days after proof.">
    <div class="page-hero page-hero--gold">
        <div class="wrap page-hero__grid">
            <div class="page-hero__copy">
                <nav class="crumbs" aria-label="Breadcrumb">
                    <a href="{{ route('home') }}">Home</a><span aria-hidden="true">/</span>
                    <a href="{{ route('custom') }}">Custom Solutions</a><span aria-hidden="true">/</span>
                    <span aria-current="page">Custom Brand Printing</span>
                </nav>
                <span class="eyebrow eyebrow--gold">The low-MOQ advantage</span>
                <h1 class="rs-h1" style="font-size:var(--h1-hero,58px)">Custom brand printing, from one box</h1>
                <p class="rs-lead" style="color:var(--rs-neutral-800)">Most printers ask for 10 to 25 boxes before they will mount a cylinder. We start at one box of tape, or one bag of strapping patty — so a first order can carry your logo, and a seasonal run does not have to be a year's supply.</p>
                <div class="hero__ctas">
                    <button type="button" class="rs-btn rs-btn--accent" data-enquire data-product="Customized Printed Logo Tape" data-spec="Custom print from 1 box"><x-ui-icon name="stamp" :size="19" /> Start a custom print enquiry</button>
                    <a class="rs-btn rs-btn--eco" href="{{ $wa }}"><x-ui-icon name="message-circle" :size="19" /> Send artwork on WhatsApp</a>
                </div>
                <div class="hero-facts">
                    @foreach ($facts as [$n, $label])
                        <span><strong>{{ $n }}</strong><span>{{ $label }}</span></span>
                    @endforeach
                </div>
            </div>
            @include('partials.box-math', ['extra' => [['Reorders', 'Straight to production — cylinder stays on file']]])
        </div>
    </div>

    <section class="sec sec--76">
        <div class="wrap stack">
            <div class="sec-head">
                <div class="sec-head__copy" style="max-width:62ch">
                    <span class="eyebrow">Why the minimum matters</span>
                    <h2 class="rs-h2">A minimum is a business decision, not a technical limit</h2>
                    <p class="body-copy">Mounting a printing cylinder takes the same setup whether you order one box or fifty. Most suppliers price that setup by refusing small orders. We price it into the quote instead, which is why the number below is one.</p>
                </div>
            </div>
            <div class="row row-cols-1 row-cols-lg-2 g-20 g-m-12">
                <div class="col">
                    <div class="compare h-100">
                        <span class="label-caps">Industry norm</span>
                        <span class="compare__n" style="color:var(--rs-neutral-700)">10–25 boxes</span>
                        <p>Roughly 360 to 900 rolls before a single one is used. For a growing brand that is a year of stock bought on a guess about next season's volume, and a warehouse corner that stops being available.</p>
                    </div>
                </div>
                <div class="col">
                    <div class="compare compare--gold h-100">
                        <span class="label-caps" style="color:var(--gold-ink)">Rashee minimum</span>
                        <span class="compare__n">1 box</span>
                        <p style="color:var(--rs-neutral-800)">Thirty-six rolls, printed to your artwork on the same film and the same adhesive as our largest accounts. One bag — five boxes — for strapping patty. Reorder when you need more; the cylinder stays on file.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="sec sec--76 sec--gold" style="border-top:1px solid var(--rs-gold-200)">
        <div class="wrap stack">
            <div class="sec-head">
                <div class="sec-head__copy" style="max-width:62ch">
                    <span class="eyebrow eyebrow--gold">The process</span>
                    <h2 class="rs-h2">Artwork to dispatch in four steps</h2>
                    <p class="body-copy body-copy--dark">Nothing goes on a cylinder before you have seen a proof. Every stage below has a stated turnaround, and a named specialist stays on the thread from enquiry to delivery.</p>
                </div>
            </div>
            <ol class="row row-cols-1 row-cols-lg-2 g-16 g-m-10 list-unstyled mb-0">
                @foreach ($steps as $i => $s)
                    <li class="col d-flex">@include('partials.step', ['n' => $i + 1, 's' => $s, 'tag' => 'div'])</li>
                @endforeach
            </ol>
        </div>
    </section>

    <section class="sec sec--76">
        <div class="wrap stack">
            <div class="sec-head">
                <div class="sec-head__copy" style="max-width:62ch">
                    <span class="eyebrow">Print options</span>
                    <h2 class="rs-h2">What we can put on the film</h2>
                    <p class="body-copy">Flexographic printing with water-based ink, up to three spot colours. Pick the film first — colour behaves differently on tan than on milky white — then the number of colours.</p>
                </div>
            </div>
            <div class="row row-cols-1 row-cols-lg-3 g-20 g-m-14">
                @foreach ($options as $o)
                    <div class="col">
                        <div class="option h-100">
                            <span class="option__art" role="img" aria-label="{{ $o['alt'] }}" style="background:{{ $o['bg'] }}">
                                <i style="top:52px;height:34px;background:{{ $o['s1'] }}"></i>
                                @if ($o['s2'])<i style="top:96px;height:14px;background:{{ $o['s2'] }}"></i>@endif
                                <span class="art__shot" aria-hidden="true">{{ $o['shot'] }}</span>
                            </span>
                            <span class="option__body">
                                <span class="rs-h3">{{ $o['name'] }}</span>
                                <span class="option__text">{{ $o['body'] }}</span>
                                <span class="chip-spec chip-spec--lg">{{ $o['tag'] }}</span>
                            </span>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <section class="sec sec--76 sec--subtle" style="border-bottom:0">
        <div class="wrap">
            <div class="eco-split">
                <div class="eco-split__copy" style="gap:14px">
                    <span class="eyebrow">Artwork</span>
                    <h2 class="rs-h2">What to send us</h2>
                    <p class="body-copy">If you have a print-ready file we will use it as is. If you have a logo and nothing else, send that — setting the repeat and the colour separation is our job, not yours.</p>
                    <ul class="checks checks--blue">
                        @foreach ($artwork as [$lead, $body])
                            <li><span><x-ui-icon name="check" :size="15" /></span><span><strong>{{ $lead }}</strong> {{ $body }}</span></li>
                        @endforeach
                    </ul>
                </div>
                <div class="eco-art eco-art--after">
                    <div class="eco-art__frame art-print" role="img" aria-label="A printed tape roll partly unwound across a workbench, the repeated two-colour logo visible along the film with registration marks at the edge.">
                        <i class="p1"></i><i class="p2"></i><i class="p3"></i>
                        <span class="art__shot" aria-hidden="true">Studio: printed tape partly unwound across a workbench, two-colour repeat and registration marks visible.</span>
                    </div>
                    <span class="caption">alt: A printed tape roll partly unwound across a workbench, the repeated two-colour logo visible along the film with registration marks at the edge.</span>
                </div>
            </div>
        </div>
    </section>

    <section class="sec sec--76">
        <div class="wrap d-flex flex-column gap-3">
            <h2 class="rs-h2">Questions before a first branded run</h2>
            <div class="faq-grid">
                @foreach ($faqs as [$q, $a])
                    <div class="faq"><h3>{{ $q }}</h3><p>{{ $a }}</p></div>
                @endforeach
            </div>
        </div>
    </section>

    <section class="cta-sec" style="padding:76px 0">
        <div class="wrap"><x-cta-block :custom="true" product="Customized Printed Logo Tape" /></div>
    </section>

    <x-slot:actions>
        <div class="float-cta">
            <a class="float-cta__wa" href="{{ $wa }}" aria-label="Send artwork on WhatsApp"><x-ui-icon name="message-circle" :size="20" /></a>
            <button type="button" class="rs-btn rs-btn--primary" data-enquire data-product="Customized Printed Logo Tape" data-spec="Custom print from 1 box"><x-ui-icon name="ruler" :size="18" /> Instant Spec Quote</button>
        </div>
        <div class="action-bar">
            <a href="{{ $wa }}"><x-ui-icon name="message-circle" :size="18" /> Send artwork</a>
            <button type="button" class="action-bar__gold" data-enquire data-product="Customized Printed Logo Tape" data-spec="Custom print from 1 box"><x-ui-icon name="stamp" :size="18" /> Print from 1 box</button>
        </div>
    </x-slot:actions>
</x-layouts.app>
