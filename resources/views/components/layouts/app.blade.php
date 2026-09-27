@props(['title' => null, 'description' => null, 'stickyBuy' => false, 'actions' => null])
<!DOCTYPE html>
<html lang="en-IN">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title ? $title.' · Rashee Enterprises' : 'Rashee Enterprises · Industrial tapes & strapping, made in Mumbai' }}</title>
    <meta name="description" content="{{ $description ?: 'Rashee Enterprises manufactures BOPP tapes, masking and filament tapes, and PP strapping patty in Mumbai — with custom brand printing from a single box.' }}">
    <meta name="theme-color" content="#22729b">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" type="image/png" href="{{ asset('images/logos/symbol.png') }}">
    <link rel="preload" href="{{ asset('fonts/oswald.woff2') }}" as="font" type="font/woff2" crossorigin>
    <link rel="preload" href="{{ asset('fonts/roboto-flex.woff2') }}" as="font" type="font/woff2" crossorigin>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/tokens.css') }}?v={{ filemtime(public_path('css/tokens.css')) }}">
    <link rel="stylesheet" href="{{ asset('css/rashee.css') }}?v={{ filemtime(public_path('css/rashee.css')) }}">
</head>
<body @class(['has-sticky-buy' => $stickyBuy])>
    <a class="skip-link" href="#main">Skip to content</a>

    @include('partials.header')

    <main id="main">
        {{ $slot }}
    </main>

    @include('partials.footer')

    @if ($actions)
        {{ $actions }}
    @else
        @include('partials.quick-actions')
    @endif

    @include('partials.enquiry-modal')

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.min.js" integrity="sha384-1H217gwSVyLSIfaLxHbE7dRb3v4mYCKbpQvzx0cegeju1MVsGrX5xXxAvs/HgeFs" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="{{ asset('js/rashee.js') }}?v={{ filemtime(public_path('js/rashee.js')) }}"></script>
    @stack('scripts')
</body>
</html>
