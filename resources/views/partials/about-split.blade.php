<section class="container section--lg split">
    <div class="photo">
        <img src="{{ asset('images/imagery/tower-a.jpg') }}" alt="" width="455" height="180" loading="lazy">
    </div>
    <div>
        <div class="eyebrow">About us</div>
        <h2 class="heading-2">At the forefront of manufacturing and trading</h2>
        <p>Our commitment is to deliver quality products and services that exceed customer expectations. With a dynamic approach and innovative strategies, we strive to be a leader in our industry.</p>
        <ul class="checklist">
            @foreach (['Top-notch manufacturing and trading solutions', 'A recognised leader in B2B and online sales', 'Fostering growth and success for our partners'] as $point)
                <li><x-ui-icon name="circle-check-big" :size="20" /> {{ $point }}</li>
            @endforeach
        </ul>
    </div>
</section>
