@php
    $contact = config('rashee.contact');
    $catalogLinks = [
        ['BOPP tapes', route('products.index', ['category' => 'Self-adhesive tapes'])],
        ['Masking tapes', route('products.show', 'paper-masking-tape')],
        ['Filament tapes', route('products.show', 'glass-filament-tape')],
        ['PP strapping patty', route('products.index', ['category' => 'Strapping'])],
        ['Printed logo tapes', route('products.show', 'customized-printed-logo-tape')],
    ];
    $qualityLinks = [
        ['Custom print from 1 box', route('custom')],
        ['1 bag = 5 boxes, strapping', route('products.show', 'pp-strapping-patty-manual')],
        ['Micron & tensile testing', route('about').'#quality'],
        ['Water-based adhesives', route('sustainability')],
        ['Recyclable PP strapping', route('sustainability').'#strapping'],
    ];
    $socials = [
        ['LinkedIn', config('rashee.social.linkedin'), 'external-link', 'Rashee Enterprises on LinkedIn'],
        ['Instagram', config('rashee.social.instagram'), 'external-link', 'Rashee Enterprises on Instagram'],
        ['Email', 'mailto:'.$contact['email'], 'mail', 'Email Rashee Enterprises'],
    ];
@endphp
<footer class="site-footer">
    <div class="wrap site-footer__inner">
        <div class="site-footer__grid">
            <div class="site-footer__brand">
                <img src="{{ asset('images/logos/white-logo.png') }}" alt="Rashee Enterprises" width="79" height="64">
                <span class="site-footer__tag">{{ config('rashee.tagline') }}</span>
                <p class="site-footer__about">{{ config('rashee.promise') }}</p>
                <div class="socials">
                    @foreach ($socials as [$name, $href, $icon, $label])
                        <a href="{{ $href }}" aria-label="{{ $label }}">{{ $name }} <x-ui-icon :name="$icon" :size="15" /></a>
                    @endforeach
                </div>
            </div>
            <div class="site-footer__col">
                <h2 class="foot-title">Catalog</h2>
                <ul>@foreach ($catalogLinks as [$label, $href])<li><a href="{{ $href }}">{{ $label }}</a></li>@endforeach</ul>
            </div>
            <div class="site-footer__col">
                <h2 class="foot-title">Low MOQ &amp; quality</h2>
                <ul>@foreach ($qualityLinks as [$label, $href])<li><a href="{{ $href }}">{{ $label }}</a></li>@endforeach</ul>
            </div>
            <div class="site-footer__col">
                <h2 class="foot-title">Direct contact</h2>
                <address>Operational HQ &amp; plant<br>Rashee Enterprises, {!! collect($contact['address'])->map(fn ($l) => e($l))->implode('<br>') !!}</address>
                <a href="mailto:{{ $contact['email'] }}">{{ $contact['email'] }}</a>
                <a href="{{ \App\Support\Site::tel() }}">{{ $contact['phone'] }}</a>
                <a class="rs-btn rs-btn--eco" href="{{ \App\Support\Site::whatsapp() }}"><x-ui-icon name="message-circle" :size="18" /> WhatsApp business line</a>
            </div>
        </div>
        <div class="site-footer__bar">
            <span>&copy; {{ date('Y') }} Rashee Enterprises. All rights reserved.</span>
            <a href="{{ route('contact') }}">Terms of supply</a>
            <a href="{{ route('contact') }}">Privacy</a>
            <span class="spacer"></span>
            <span>Built to WCAG 2.1 AA · accessibility feedback welcome</span>
        </div>
    </div>

    <div class="site-footer__mobile">
        <img src="{{ asset('images/logos/white-logo.png') }}" alt="Rashee Enterprises" width="69" height="56">
        <span class="site-footer__tag">{{ config('rashee.tagline') }}</span>
        <div class="acc">
            <details open>
                <summary><span>Brand mission</span><x-ui-icon name="chevron-down" :size="20" /></summary>
                <div class="acc__body">Wherever there are boxes, there is Rashee. We match the micron to your carton and quote it honestly — your budget, our honest execution.</div>
            </details>
            <details>
                <summary><span>Catalog</span><x-ui-icon name="chevron-down" :size="20" /></summary>
                <div class="acc__body">@foreach ($catalogLinks as [$label, $href])<a href="{{ $href }}">{{ $label }}</a>@endforeach</div>
            </details>
            <details>
                <summary><span>Custom MOQ printing</span><x-ui-icon name="chevron-down" :size="20" /></summary>
                <div class="acc__body">@foreach (array_slice($qualityLinks, 0, 2) as [$label, $href])<a href="{{ $href }}">{{ $label }}</a>@endforeach</div>
            </details>
            <details>
                <summary><span>Plant &amp; compliance</span><x-ui-icon name="chevron-down" :size="20" /></summary>
                <div class="acc__body">@foreach (array_slice($qualityLinks, 2) as [$label, $href])<a href="{{ $href }}">{{ $label }}</a>@endforeach</div>
            </details>
            <details>
                <summary><span>Direct contact</span><x-ui-icon name="chevron-down" :size="20" /></summary>
                <div class="acc__body">
                    <span>{{ implode(', ', $contact['address']) }}</span>
                    <a href="mailto:{{ $contact['email'] }}">{{ $contact['email'] }}</a>
                    <a href="{{ \App\Support\Site::tel() }}">{{ $contact['phone'] }}</a>
                </div>
            </details>
        </div>
        <a class="rs-btn rs-btn--eco" href="{{ \App\Support\Site::whatsapp() }}"><x-ui-icon name="message-circle" :size="18" /> WhatsApp a specialist</a>
        <div class="socials">
            @foreach ($socials as [$name, $href, $icon, $label])
                <a href="{{ $href }}" aria-label="{{ $label }}">{{ $name }} <x-ui-icon :name="$icon" :size="16" /></a>
            @endforeach
        </div>
        <small>&copy; {{ date('Y') }} Rashee Enterprises · Mumbai, Maharashtra · WCAG 2.1 AA</small>
    </div>
</footer>
