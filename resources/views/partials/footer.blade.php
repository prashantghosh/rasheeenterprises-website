@php
    $columns = [
        'Products' => [
            ['Industrial Supplies', route('products', ['category' => ['Fasteners']])],
            ['CNC & Fabrication', route('products', ['category' => ['Fabrication']])],
            ['Packaging', route('products', ['category' => ['Packaging']])],
            ['Bulk Materials', route('products', ['category' => ['Raw Materials']])],
        ],
        'Company' => [
            ['About Us', route('about')],
            ['Solutions', route('solutions')],
            ['Careers', route('contact')],
            ['Sustainability', route('about')],
        ],
        'Support' => [
            ['Contact', route('contact')],
            ['Request a Quote', route('contact')],
            ['Shipping', route('contact')],
            ['Returns', route('contact')],
        ],
    ];
@endphp
<footer class="site-footer">
    <div class="container site-footer__grid">
        <div>
            <a class="site-footer__brand" href="{{ route('home') }}">
                <img src="{{ asset('images/logos/white-logo.png') }}" alt="{{ config('rashee.name') }}" width="79" height="64" loading="lazy">
            </a>
            <p class="site-footer__about">Empowering your business, one solution at a time. Manufacturing &amp; trading for B2B and online sales.</p>
            <div class="social">
                @foreach (config('rashee.social') as $network => $url)
                    <a href="{{ $url }}" aria-label="{{ ucfirst($network) }}" @if ($url !== '#') target="_blank" rel="noopener" @endif>
                        <x-social-icon :name="$network" />
                    </a>
                @endforeach
            </div>
        </div>

        @foreach ($columns as $heading => $items)
            <div>
                <h2>{{ $heading }}</h2>
                <ul>
                    @foreach ($items as [$label, $href])
                        <li><a href="{{ $href }}">{{ $label }}</a></li>
                    @endforeach
                </ul>
            </div>
        @endforeach
    </div>
    <div class="site-footer__bottom">
        <div class="container">
            <span>&copy; {{ date('Y') }} {{ config('rashee.name') }}. All rights reserved.</span>
            <span>Privacy · Terms · Cookies</span>
        </div>
    </div>
</footer>
