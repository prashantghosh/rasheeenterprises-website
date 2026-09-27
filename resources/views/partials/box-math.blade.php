<div class="math">
    <span class="label-caps" style="letter-spacing:.09em">What one box actually holds</span>
    <div class="math__row">
        <span class="math__box"><span><x-ui-icon name="package" :size="32" /></span><span>1 box</span></span>
        <x-ui-icon name="arrow-right" :size="26" style="color:var(--rs-neutral-600)" />
        <span class="math__rolls">
            <span class="rolls" aria-hidden="true">@for ($i = 0; $i < 12; $i++)<i></i>@endfor</span>
            <span class="math__big">36–72 rolls</span>
        </span>
    </div>
    <p class="step__body">A box of 48mm tape holds 36 rolls; at 24mm it holds 72. At 65m a roll, one box seals roughly 2,300 medium cartons — enough for a season of e-commerce dispatch, all of it printed with your logo.</p>
    <dl class="facts">
        @foreach (array_merge(config('rashee.print_facts'), $extra ?? []) as [$k, $v])
            <div><dt>{{ $k }}</dt><dd>{{ $v }}</dd></div>
        @endforeach
    </dl>
    @if ($cta ?? false)
        <button type="button" class="rs-btn rs-btn--accent rs-btn--md" data-enquire data-product="Customized Printed Logo Tape" data-spec="Custom print from 1 box">
            <x-ui-icon name="stamp" :size="19" /> Start a custom print enquiry
        </button>
    @endif
</div>
