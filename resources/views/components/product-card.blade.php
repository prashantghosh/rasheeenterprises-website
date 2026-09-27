@props(['product', 'href' => null, 'filters' => false])
@php
    $p = $product;
    $href ??= route('products.show', $p['product'] ?? $p['slug']);
    $meta = $p['meta'];
@endphp
<article {{ $attributes->class('pcard') }}
    @if ($filters)
        data-card
        data-category="{{ $p['category'] }}"
        data-application="{{ $p['application'] }}"
        data-colours="{{ implode('|', $p['colours']) }}"
        data-micron="{{ implode('|', $p['micron']) }}"
        data-width="{{ implode('|', $p['width']) }}"
        data-price="{{ $p['price_from'] ?? 99999 }}"
        data-search="{{ mb_strtolower($p['card_name'].' '.$p['blurb'].' '.implode(' ', $p['badges']).' '.$p['category'].' '.$p['application']) }}"
    @endif
>
    <div class="art art--{{ $p['artwork'] }}" role="img" aria-label="{{ $p['alt'] }}">
        <i class="a"></i><i class="b"></i><i class="c"></i>
        @if ($p['eco'])
            <span class="badge-eco"><x-ui-icon name="leaf" :size="13" /> Recyclable</span>
        @endif
        <span class="art__shot" aria-hidden="true">{{ $p['shot'] }}</span>
    </div>
    <div class="pcard__body">
        <div class="pcard__head">
            <h3 class="rs-h3">{{ $p['card_name'] ?? $p['name'] }}</h3>
            <p class="pcard__blurb">{{ $p['blurb'] }}</p>
        </div>
        <div class="chips">
            @foreach ($p['badges'] as $badge)
                <span class="chip-spec">{{ $badge }}</span>
            @endforeach
        </div>
        <div class="meta">
            <span class="label-caps">{{ $meta[0] }}</span>
            <span class="meta__value">{{ $meta[1] }}</span>
        </div>
        <span class="moq"><x-ui-icon name="stamp" :size="14" /> {{ $p['moq'] }}</span>
        <div class="pcard__price">
            <span class="price">{{ $p['price'] }}</span>
            <span class="price-note">{{ $p['price_note'] ?? 'D2C pricing. For bulk and custom orders, please enquire.' }}</span>
        </div>
        <a class="pcard__cta" href="{{ $href }}">View Details <x-ui-icon name="arrow-right" :size="17" /><span class="sr-only"> for {{ $p['card_name'] ?? $p['name'] }}</span></a>
    </div>
</article>
