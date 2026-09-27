@props(['tone' => 'neutral', 'dot' => false])
<span {{ $attributes->class(['badge', "badge--{$tone}"]) }}>
    @if ($dot)<span class="badge__dot"></span>@endif
    {{ $slot }}
</span>
