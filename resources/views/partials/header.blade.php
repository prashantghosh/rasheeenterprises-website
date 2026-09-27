@php $contact = config('rashee.contact'); @endphp
<header class="site-header">
    <div class="wrap topbar">
        <span><x-ui-icon name="map-pin" :size="14" /> Manufactured in Mumbai · shipped across India</span>
        <span class="spacer"></span>
        <span><x-ui-icon name="phone" :size="14" /> <a href="{{ \App\Support\Site::tel() }}">{{ $contact['phone'] }}</a></span>
        <span class="topbar__sep" aria-hidden="true"></span>
        <span>{{ $contact['hours'] }}</span>
    </div>

    <div class="wrap mainbar">
        <a class="brand" href="{{ route('home') }}" aria-label="Rashee Enterprises — home">
            <img src="{{ asset('images/logos/logo.png') }}" alt="Rashee Enterprises" width="59" height="48">
        </a>
        @include('partials.nav')
        <span class="spacer"></span>
        <form class="search" action="{{ route('products.index') }}" method="GET" role="search">
            <x-ui-icon name="search" :size="17" />
            <input type="search" name="q" value="{{ request('q') }}" placeholder="Search micron, width, use" aria-label="Search products by micron, width or use">
        </form>
        <a class="pill-eco" href="{{ route('sustainability') }}"><x-ui-icon name="leaf" :size="14" /> Going Green</a>
        <button type="button" class="rs-btn rs-btn--primary rs-btn-quote" data-enquire>
            <x-ui-icon name="ruler" :size="17" /> Request a Quote
        </button>
    </div>

    <div class="mobilebar">
        <a class="brand" href="{{ route('home') }}" aria-label="Rashee Enterprises — home">
            <img src="{{ asset('images/logos/logo.png') }}" alt="Rashee Enterprises" width="49" height="40">
        </a>
        <a class="pill-eco pill-eco--sm" href="{{ route('sustainability') }}"><x-ui-icon name="leaf" :size="12" /> Eco</a>
        <span class="spacer"></span>
        <button type="button" class="icon-btn" aria-label="Search products" data-bs-toggle="offcanvas" data-bs-target="#site-menu" data-focus-search>
            <x-ui-icon name="search" :size="21" />
        </button>
        <button type="button" class="icon-btn" aria-label="Open menu" data-bs-toggle="offcanvas" data-bs-target="#site-menu" aria-controls="site-menu">
            <x-ui-icon name="menu" :size="22" />
        </button>
    </div>
</header>

<div class="offcanvas offcanvas-end rs-offcanvas" tabindex="-1" id="site-menu" aria-labelledby="site-menu-title">
    <div class="offcanvas-header">
        <img src="{{ asset('images/logos/logo.png') }}" alt="" width="49" height="40">
        <h2 class="visually-hidden" id="site-menu-title">Menu</h2>
        <span class="spacer"></span>
        <button type="button" class="icon-btn" data-bs-dismiss="offcanvas" aria-label="Close menu"><x-ui-icon name="x" :size="20" /></button>
    </div>
    <div class="offcanvas-body">
        <form class="search" action="{{ route('products.index') }}" method="GET" role="search">
            <x-ui-icon name="search" :size="18" />
            <input type="search" name="q" value="{{ request('q') }}" placeholder="Search micron, width, use" aria-label="Search products by micron, width or use">
        </form>
        @include('partials.nav')
        <button type="button" class="rs-btn rs-btn--primary rs-btn--md" data-enquire data-bs-dismiss="offcanvas"><x-ui-icon name="ruler" :size="18" /> Request a Quote</button>
        <a class="rs-btn rs-btn--outline rs-btn--md" href="{{ route('contact') }}"><x-ui-icon name="mail" :size="18" /> Contact</a>
    </div>
</div>
