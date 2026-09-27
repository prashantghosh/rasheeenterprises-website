{{-- Contact.dc.html — the form posts to /enquiries (AJAX with a normal POST fallback). --}}
@php
    $contact = config('rashee.contact');
    $wa = \App\Support\Site::whatsapp('Hello Rashee, I would like help with a tape or strapping spec.');
    $channels = [
        ['message-circle', 'WhatsApp', $contact['whatsapp'] ? '+'.$contact['whatsapp'] : $contact['phone'], 'Fastest route. Send a photo of the carton.', $wa, true],
        ['mail', 'Email', $contact['email'], 'Reply within one working day.', 'mailto:'.$contact['email'], false],
        ['phone', 'Phone', $contact['phone'], 'Mon–Sat, 9:30–18:30 IST.', \App\Support\Site::tel(), false],
    ];
    $topics = ['Bulk / volume pricing', 'Custom brand printing', 'Spec advice', 'Samples', 'Something else'];
    $hours = [['Monday – Friday', '9:30 – 18:30 IST', true], ['Saturday', '9:30 – 14:00 IST', true], ['Sunday & public holidays', 'Closed', false]];
    $routing = [
        ['ruler', 'Spec and technical queries', 'A packaging specialist who works the coating line, not a sales desk.'],
        ['stamp', 'Custom print enquiries', 'Straight to the print team, who set the repeat and return a digital proof.'],
        ['truck', 'Dispatch and order status', 'Plant despatch answer directly on stock lines and freight bookings.'],
    ];
    $sentRef = session('enquiry_sent');
    $mapUrl = 'https://www.google.com/maps/search/?api=1&query='.rawurlencode('Rashee Enterprises, '.implode(', ', $contact['address']));
@endphp
<x-layouts.app title="Contact" description="Talk to a Rashee Enterprises packaging specialist: send a carton weight and how it travels, and get a specification back within one working day.">
    <div class="page-head">
        <div class="wrap page-head__inner page-head__inner--about">
            <nav class="crumbs" aria-label="Breadcrumb">
                <a href="{{ route('home') }}">Home</a><span aria-hidden="true">/</span><span aria-current="page">Contact</span>
            </nav>
            <span class="eyebrow">Talk to a specialist</span>
            <h1 class="rs-h1 rs-h1--54">Tell us what you are sealing</h1>
            <p class="rs-lead" style="font-size:17.5px;line-height:1.62;max-width:64ch">An enquiry reaches someone who knows the coating line, not a form-filler. Send a carton weight and how it travels and you will get a specification back, not a rate card. No obligation, and no automated sales calls afterwards.</p>
            <div class="channels">
                @foreach ($channels as [$icon, $label, $value, $note, $href, $eco])
                    <a @class(['channel', 'channel--eco' => $eco]) href="{{ $href }}">
                        <span class="channel__icon"><x-ui-icon :name="$icon" :size="20" /></span>
                        <span class="d-flex flex-column" style="gap:2px;min-width:0">
                            <span class="channel__label">{{ $label }}</span>
                            <span class="channel__value">{{ $value }}</span>
                            <span class="channel__note">{{ $note }}</span>
                        </span>
                    </a>
                @endforeach
            </div>
        </div>
    </div>

    <section class="sec sec--68">
        <div class="wrap">
            <div class="split split--contact">
                <div class="form-card" data-state="{{ $sentRef ? 'success' : 'form' }}">
                    <form method="POST" action="{{ route('enquiries.store') }}" novalidate data-enquiry-form data-inline class="d-flex flex-column" style="gap:22px">
                        @csrf
                        <input type="hidden" name="type" value="contact">
                        <input type="hidden" name="source" value="{{ url()->current() }}">
                        <input type="hidden" name="product" value="{{ old('product', $topics[0]) }}" data-topic-input>

                        <div class="d-flex flex-column" style="gap:6px" data-show="form">
                            <span class="eyebrow">Specification enquiry</span>
                            <h2 class="rs-h2 rs-h2--sm">Send us your spec</h2>
                            <p class="body-copy" style="font-size:14.5px">Same fields our specialists work from. Anything you leave blank we will ask about — nothing here is a gate.</p>
                        </div>

                        <div class="rs-alert" role="alert" @if (! $errors->any()) hidden @endif data-alert>
                            <x-ui-icon name="circle-alert" :size="18" />
                            <span data-alert-text>{{ $errors->count() === 1 ? 'One field needs attention' : ($errors->count() ?: 'Some').' fields need attention' }} before we can route this to the right specialist.</span>
                        </div>

                        <div class="fields" data-show="form">
                            <div class="field-row">
                                <div class="field">
                                    <label for="c-name">Your name</label>
                                    <input id="c-name" name="name" value="{{ old('name') }}" placeholder="Full name" autocomplete="name">
                                </div>
                                <div class="field">
                                    <label for="c-company">Company</label>
                                    <input id="c-company" name="company" value="{{ old('company') }}" placeholder="Business name" autocomplete="organization">
                                </div>
                            </div>
                            <div class="field-row">
                                <div @class(['field', 'has-error' => $errors->has('email')])>
                                    <label for="c-email">Work email</label>
                                    <input id="c-email" name="email" type="email" value="{{ old('email') }}" placeholder="you@company.com" autocomplete="email" aria-describedby="c-email-error" required>
                                    <span class="field__error" id="c-email-error" data-error="email">{{ $errors->first('email') }}</span>
                                </div>
                                <div class="field">
                                    <label for="c-phone">Mobile / WhatsApp</label>
                                    <input id="c-phone" name="phone" type="tel" value="{{ old('phone') }}" placeholder="+91 " autocomplete="tel">
                                </div>
                            </div>
                            <fieldset class="axis">
                                <legend class="axis__label"><strong>What do you need?</strong> <span>Pick the closest — we will refine it with you</span></legend>
                                <div class="vchips">
                                    @foreach ($topics as $t)
                                        <button type="button" class="vchip" data-topic="{{ $t }}" aria-pressed="{{ old('product', $topics[0]) === $t ? 'true' : 'false' }}"><x-ui-icon name="check" :size="15" /> {{ $t }}</button>
                                    @endforeach
                                </div>
                            </fieldset>
                            <div class="field-row">
                                <div class="field">
                                    <label for="c-qty">Estimated quantity</label>
                                    <input id="c-qty" name="quantity" value="{{ old('quantity') }}" placeholder="e.g. 40 boxes" aria-describedby="c-qty-hint">
                                    <span class="field__hint" id="c-qty-hint">Boxes, bags or pallets — an estimate is fine.</span>
                                </div>
                                <div class="field">
                                    <label for="c-weight">Typical box weight</label>
                                    <input id="c-weight" name="box_weight" value="{{ old('box_weight') }}" placeholder="e.g. 12 kg" aria-describedby="c-weight-hint">
                                    <span class="field__hint" id="c-weight-hint">Lets us confirm the micron grade.</span>
                                </div>
                            </div>
                            <div class="field">
                                <label for="c-notes">Requirement notes</label>
                                <textarea id="c-notes" name="message" rows="4" style="min-height:104px" placeholder="Width, adhesion conditions, cold storage, logo colours — anything that affects the spec." aria-describedby="c-notes-hint">{{ old('message') }}</textarea>
                                <span class="field__hint" id="c-notes-hint">Sealing on a high-speed carton line? Say so — it changes the tack we recommend.</span>
                            </div>
                            <div class="d-flex flex-column" style="gap:10px;padding-top:4px">
                                <div class="btn-row">
                                    <button type="submit" class="rs-btn rs-btn--primary rs-btn--grow rs-btn--md" style="flex-basis:200px"><x-ui-icon name="mail" :size="18" /> Send enquiry by email</button>
                                    <a class="rs-btn rs-btn--eco rs-btn--grow rs-btn--md" href="{{ $wa }}" data-whatsapp-enquiry><x-ui-icon name="message-circle" :size="18" /> Send on WhatsApp</a>
                                </div>
                                <span class="modal__note">No obligation, no automated sales calls. Your budget, our honest execution.</span>
                            </div>
                        </div>

                        <div class="success" data-show="success">
                            <div class="success__head">
                                <span class="success__icon"><x-ui-icon name="check" :size="26" /></span>
                                <div>
                                    <span class="success__title" style="font-size:26px">Enquiry received</span>
                                    <p class="success__ref">Reference <strong data-ref>{{ $sentRef ?? 'RQ-0000' }}</strong> · sent to our tape specialists</p>
                                </div>
                            </div>
                            <div class="panel">
                                <strong>What happens next</strong>
                                <p>A specialist confirms micron and adhesive suitability against your carton weight, then sends indicative pricing within one working day. If artwork is ready, attach it to the WhatsApp thread and we will return a print proof with the quote.</p>
                            </div>
                            <div class="btn-row">
                                <a class="rs-btn rs-btn--eco rs-btn--grow rs-btn--md" href="{{ $wa }}" data-whatsapp-enquiry><x-ui-icon name="message-circle" :size="18" /> Continue on WhatsApp</a>
                                <a class="rs-btn rs-btn--outline rs-btn--grow rs-btn--md" href="{{ route('contact') }}" data-reset>Send another enquiry</a>
                            </div>
                        </div>
                    </form>
                </div>

                <div class="d-flex flex-column aside-stack">
                    <div class="panel-card" id="visit">
                        <span class="label-caps" style="letter-spacing:.09em">Operational HQ &amp; plant</span>
                        <address class="plant-address">Rashee Enterprises<br>{!! collect($contact['address'])->map(fn ($l) => e($l))->implode('<br>') !!}</address>
                        <p class="step__body" style="font-size:13.5px">Coating, slitting and printing all happen here. Plant visits welcome on weekdays with 48 hours' notice.</p>
                        <div class="map-art" role="img" aria-label="Simplified locator map of the Mumbai industrial estate, with the plant marked at the junction of two arterial roads.">
                            <i class="grid"></i><i class="road-h"></i><i class="road-v"></i><i class="road-s"></i><i class="plot"></i>
                            <span class="map-art__pin"><x-ui-icon name="map-pin" :size="20" /></span>
                            <span class="art__shot" aria-hidden="true">Locator diagram — not to scale.</span>
                        </div>
                        <a class="rs-btn rs-btn--outline rs-btn--48" href="{{ $mapUrl }}" target="_blank" rel="noopener"><x-ui-icon name="map-pin" :size="17" /> Open in maps</a>
                    </div>
                    <div class="panel-card">
                        <span class="label-caps" style="letter-spacing:.09em">Business hours</span>
                        <dl class="hours">
                            @foreach ($hours as [$day, $time, $open])
                                <div @class(['is-closed' => ! $open])><dt>{{ $day }}</dt><dd>{{ $time }}</dd></div>
                            @endforeach
                        </dl>
                        <p class="notice notice--sm"><x-ui-icon name="message-circle" :size="17" /><span><strong>WhatsApp is monitored outside hours.</strong> Messages sent overnight are answered first thing; urgent dispatch queries reach the plant directly.</span></p>
                    </div>
                    <div class="panel-card">
                        <span class="label-caps" style="letter-spacing:.09em">Who picks this up</span>
                        @foreach ($routing as [$icon, $title, $body])
                            <div class="route">
                                <span class="route__icon"><x-ui-icon :name="$icon" :size="17" /></span>
                                <span class="d-flex flex-column" style="gap:2px;min-width:0"><strong>{{ $title }}</strong><span>{{ $body }}</span></span>
                            </div>
                        @endforeach
                        <span class="small-note" style="font-size:13px;line-height:1.55">Every enquiry gets a named contact who stays on the thread through to delivery.</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="cta-sec" style="padding:68px 0">
        <div class="wrap"><x-cta-block /></div>
    </section>

    <x-slot:actions>
        <div class="float-cta">
            <a class="float-cta__wa" href="{{ $wa }}" aria-label="Chat with a specialist on WhatsApp"><x-ui-icon name="message-circle" :size="20" /></a>
            <button type="button" class="rs-btn rs-btn--primary" data-enquire><x-ui-icon name="ruler" :size="18" /> Instant Spec Quote</button>
        </div>
        <div class="action-bar">
            <a href="{{ $wa }}"><x-ui-icon name="message-circle" :size="18" /> WhatsApp</a>
            <a class="action-bar__blue" href="{{ \App\Support\Site::tel() }}"><x-ui-icon name="phone" :size="18" /> Call the plant</a>
        </div>
    </x-slot:actions>
</x-layouts.app>
