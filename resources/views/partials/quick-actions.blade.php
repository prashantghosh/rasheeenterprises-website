{{-- Desktop: floating WhatsApp + spec quote pill. Mobile: sticky action bar. --}}
@php $wa = \App\Support\Site::whatsapp('Hello Rashee, I need help choosing a tape or strap.'); @endphp
<div class="float-cta">
    <a class="float-cta__wa" href="{{ $wa }}" aria-label="Chat with a specialist on WhatsApp">
        <x-ui-icon name="message-circle" :size="20" />
    </a>
    <button type="button" class="rs-btn rs-btn--primary" data-enquire><x-ui-icon name="ruler" :size="18" /> Instant Spec Quote</button>
</div>
<div class="action-bar action-bar--page">
    <a href="{{ $wa }}"><x-ui-icon name="message-circle" :size="18" /> Chat on WhatsApp</a>
    <button type="button" data-enquire><x-ui-icon name="ruler" :size="18" /> Instant Spec Quote</button>
</div>
