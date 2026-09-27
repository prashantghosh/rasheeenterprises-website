<x-layouts.app title="Solutions" description="Manufacturing, trading & distribution, and online B2B sales — superior solutions, end to end, from Rashee Enterprises.">
    <section class="container section--lg">
        <div class="section-head--center">
            <div class="eyebrow eyebrow--gold">Solutions</div>
            <h1 class="display-2">Superior solutions, end to end</h1>
        </div>
        <div class="grid grid--3" style="gap:24px">
            @foreach (config('rashee.solutions') as $solution)
                <article class="card card--padded card--interactive">
                    <span class="icon-tile icon-tile--brand"><x-ui-icon :name="$solution['icon']" :size="28" /></span>
                    <h2 class="heading-3" style="margin-bottom:10px">{{ $solution['title'] }}</h2>
                    <p class="card__text">{{ $solution['body'] }}</p>
                </article>
            @endforeach
        </div>
    </section>

    @include('partials.cta-band')
</x-layouts.app>
