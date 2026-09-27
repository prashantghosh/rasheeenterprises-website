@props(['eyebrow', 'title'])
<div class="page-hero">
    <div class="container page-hero__inner">
        <div>
            <div class="eyebrow">{{ $eyebrow }}</div>
            <h1 class="heading-2">{{ $title }}</h1>
        </div>
        {{ $slot }}
    </div>
</div>
