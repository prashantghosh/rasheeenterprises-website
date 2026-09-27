@props(['marketplaces' => ['shopify', 'amazon', 'flipkart'], 'custom' => false, 'product' => null])
@php
    $links = collect($marketplaces)->map(fn ($k) => config("rashee.marketplaces.$k"))->filter();
    $zero = $custom || $links->isEmpty();
@endphp
<div {{ $attributes->class(['cta-block', 'cta-block--zero' => $zero]) }}>
    @if ($zero)
        <div class="cta-card cta-card--order">
            <span class="tag-order"><x-ui-icon name="factory" :size="15" /> Made to order</span>
            @if ($custom)
                <span class="cta-card__title">Printed to your artwork, so it is produced per order</span>
                <p class="cta-card__text">Custom-printed tape is not sold through marketplaces — every run carries your logo, micron and width. Priced to spec, from just one box.</p>
            @else
                <span class="cta-card__title">Sold direct, specified to your load</span>
                <p class="cta-card__text">This line is supplied direct from the Mumbai plant rather than through marketplaces. Priced to spec, from just one box or bag.</p>
            @endif
        </div>
    @else
        <div class="cta-card cta-card--market">
            <div>
                <span class="cta-card__title">Buying a few boxes?</span>
                <p class="cta-card__text">This exact variant is listed and ready to ship. D2C pricing, no minimum.</p>
            </div>
            <div class="market-links">
                @foreach ($links as $l)
                    <a class="market-link" href="{{ $l['url'] }}" target="_blank" rel="noopener">
                        <span><strong>{{ $l['name'] }}</strong><small>{{ $l['note'] }}</small></span>
                        <x-ui-icon name="external-link" :size="16" />
                        <span class="sr-only">(opens in a new tab)</span>
                    </a>
                @endforeach
            </div>
            <span class="small-note">Opens in a new tab. Marketplace listings carry D2C pricing only.</span>
        </div>
    @endif

    <div class="cta-card cta-card--biz">
        <div>
            <span class="cta-card__title">Buying for your business?</span>
            <p class="cta-card__text">Volume pricing, custom brand print from 1 box, and a specialist who matches micron and tack to your carton weight.</p>
        </div>
        <div class="btn-row">
            <button type="button" class="rs-btn rs-btn--white" data-enquire @if ($product) data-product="{{ $product }}" @endif data-spec-from-page>
                Enquire for Bulk Order <x-ui-icon name="arrow-right" :size="18" />
            </button>
            <a class="rs-btn rs-btn--eco" href="{{ \App\Support\Site::whatsapp('Hello Rashee, I would like bulk pricing'.($product ? ' for '.$product : '').'.') }}" data-whatsapp>
                <x-ui-icon name="message-circle" :size="18" /> WhatsApp a Specialist
            </a>
        </div>
        <ul class="ticks">
            <li><x-ui-icon name="check" :size="15" /> Custom print from 1 box</li>
            <li><x-ui-icon name="check" :size="15" /> Spec matched to box weight</li>
            <li><x-ui-icon name="check" :size="15" /> Reply within one working day</li>
        </ul>
    </div>
</div>
