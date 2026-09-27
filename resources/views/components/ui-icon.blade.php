@props(['name', 'size' => 20])
@php
    static $cache = [];
    $cache[$name] ??= trim(preg_replace('/^<svg[^>]*>|<\/svg>\s*$/', '', file_get_contents(resource_path("icons/{$name}.svg"))));
@endphp
<svg {{ $attributes->class('icon') }} xmlns="http://www.w3.org/2000/svg" width="{{ $size }}" height="{{ $size }}" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" focusable="false">{!! $cache[$name] !!}</svg>
