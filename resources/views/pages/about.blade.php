<x-layouts.app title="About us" description="Rashee Enterprises stands at the forefront of manufacturing and trading, empowering businesses through superior solutions.">
    <x-page-hero eyebrow="About us" title="Empowering businesses through superior solutions" />

    @include('partials.about-split')

    <section class="section--band">
        <div class="container">
            <div class="grid grid--3">
                <article class="card card--padded mv-card">
                    <span class="accent-bar"></span>
                    <span class="icon-tile"><x-ui-icon name="target" :size="26" /></span>
                    <h2 class="heading-3">Our mission</h2>
                    <p class="card__text">To provide top-notch manufacturing and trading solutions that empower businesses worldwide.</p>
                </article>
                <article class="card card--padded mv-card">
                    <span class="accent-bar"></span>
                    <span class="icon-tile"><x-ui-icon name="eye" :size="26" /></span>
                    <h2 class="heading-3">Our vision</h2>
                    <p class="card__text">To be a recognised leader in B2B and online sales solutions, fostering growth and success for our partners.</p>
                </article>
                <article class="card card--padded mv-card">
                    <span class="accent-bar"></span>
                    <span class="icon-tile"><x-ui-icon name="handshake" :size="26" /></span>
                    <h2 class="heading-3">Our promise</h2>
                    <p class="card__text">Quality products and services that exceed customer expectations, delivered with a dynamic, innovative approach.</p>
                </article>
            </div>
        </div>
    </section>

    <section class="container section--lg">
        <div class="section-head--center">
            <div class="eyebrow">Our values</div>
            <h2 class="heading-2">What we stand for</h2>
        </div>
        <div class="grid grid--3">
            @foreach (config('rashee.values') as $value)
                <article class="card card--padded card--interactive">
                    <span class="icon-tile"><x-ui-icon :name="$value['icon']" :size="26" /></span>
                    <h3 class="heading-3">{{ $value['title'] }}</h3>
                    <p class="card__text">{{ $value['body'] }}</p>
                </article>
            @endforeach
        </div>
    </section>

    <section class="container" style="padding-bottom:72px">
        <p class="slogan">“{{ config('rashee.slogan') }}”</p>
    </section>

    @include('partials.cta-band')
</x-layouts.app>
