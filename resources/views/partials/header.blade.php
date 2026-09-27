@php
    $links = [
        'home' => 'Home',
        'products' => 'Products',
        'solutions' => 'Solutions',
        'about' => 'About',
        'contact' => 'Contact',
    ];
@endphp
<header class="site-header">
    <div class="container site-header__inner">
        <a class="site-header__brand" href="{{ route('home') }}">
            <img src="{{ asset('images/logos/logo.png') }}" alt="{{ config('rashee.name') }}" width="59" height="48">
        </a>

        <nav id="site-nav" class="site-nav" aria-label="Main">
            @foreach ($links as $route => $label)
                <a href="{{ route($route) }}"{!! request()->routeIs($route) ? ' aria-current="page"' : '' !!}>{{ $label }}</a>
            @endforeach
            <a class="btn btn--primary site-nav__mobile-cta" href="{{ route('contact') }}">
                Request a quote <x-ui-icon name="arrow-up-right" :size="16" />
            </a>
        </nav>

        <div class="site-header__actions">
            <a class="btn btn--ghost btn--sm site-header__search" href="{{ route('products') }}#catalog-search">
                <x-ui-icon name="search" :size="18" /> Search
            </a>
            <a class="btn btn--primary btn--sm" href="{{ route('contact') }}">
                Request a quote <x-ui-icon name="arrow-up-right" :size="16" />
            </a>
            <button type="button" class="icon-btn nav-toggle" data-nav-toggle aria-controls="site-nav" aria-expanded="false">
                <x-ui-icon name="menu" :size="20" />
                <span class="sr-only">Menu</span>
            </button>
        </div>
    </div>
</header>
