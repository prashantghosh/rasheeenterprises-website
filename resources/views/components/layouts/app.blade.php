@props(['title' => null, 'description' => null])
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title ? $title.' — '.config('rashee.name') : config('rashee.name').' — '.config('rashee.slogan') }}</title>
    <meta name="description" content="{{ $description ?: 'Rashee Enterprises delivers quality manufacturing and trading solutions for B2B and online sales — built on integrity, reliability, and innovation.' }}">
    <meta name="theme-color" content="#41a9dc">
    <link rel="icon" type="image/png" href="{{ asset('images/logos/symbol.png') }}">
    <link rel="preload" href="{{ asset('fonts/oswald.woff2') }}" as="font" type="font/woff2" crossorigin>
    <link rel="preload" href="{{ asset('fonts/roboto-flex.woff2') }}" as="font" type="font/woff2" crossorigin>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <a class="skip-link" href="#main">Skip to content</a>

    @include('partials.header')

    <main id="main">
        {{ $slot }}
    </main>

    @include('partials.footer')
    @include('partials.toast')
</body>
</html>
