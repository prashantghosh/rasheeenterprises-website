<x-layouts.app title="Contact" description="Tell us what you need and the Rashee Enterprises team will respond within one business day with tailored pricing and availability.">
    <section class="container contact">
        <div>
            <div class="eyebrow">Get in touch</div>
            <h1 class="display-2">Let's build a solution together</h1>
            <p class="lead">Tell us what you need and our team will respond within one business day with tailored pricing and availability.</p>
            <ul class="contact-list">
                @php $contact = config('rashee.contact'); @endphp
                <li>
                    <span class="icon-tile icon-tile--sm"><x-ui-icon name="mail" :size="20" /></span>
                    <div>
                        <div class="contact-list__label">Email</div>
                        <a class="contact-list__value" href="mailto:{{ $contact['email'] }}">{{ $contact['email'] }}</a>
                    </div>
                </li>
                <li>
                    <span class="icon-tile icon-tile--sm"><x-ui-icon name="phone" :size="20" /></span>
                    <div>
                        <div class="contact-list__label">Phone</div>
                        <a class="contact-list__value" href="tel:{{ preg_replace('/[^\d+]/', '', $contact['phone']) }}">{{ $contact['phone'] }}</a>
                    </div>
                </li>
                <li>
                    <span class="icon-tile icon-tile--sm"><x-ui-icon name="map-pin" :size="20" /></span>
                    <div>
                        <div class="contact-list__label">Head office</div>
                        <div class="contact-list__value">{{ $contact['address'] }}</div>
                    </div>
                </li>
            </ul>
        </div>

        <div class="card card--lg card--padded">
            @if (session('sent'))
                <div class="sent" role="status">
                    <span class="sent__icon"><x-ui-icon name="check" :size="34" /></span>
                    <h2>Message sent</h2>
                    <p class="muted" style="font-size:var(--text-sm)">Thanks — we'll be in touch within a day.</p>
                    <a class="btn btn--outline" href="{{ route('contact') }}">Send another</a>
                </div>
            @else
                <form class="form-grid" method="POST" action="{{ route('contact.store') }}">
                    @csrf
                    <div class="form-row">
                        <x-input name="first_name" label="First name" placeholder="Jordan" autocomplete="given-name" required />
                        <x-input name="last_name" label="Last name" placeholder="Rivera" autocomplete="family-name" />
                    </div>
                    <x-input name="email" type="email" label="Work email" placeholder="you@company.com" icon="mail" autocomplete="email" required />
                    <x-select name="interest" label="Interest" placeholder="Select…" :options="config('rashee.interests')" />
                    <x-input name="company" label="Company" placeholder="Acme Industrial" autocomplete="organization" />
                    <x-input name="message" type="textarea" label="How can we help? (optional)" placeholder="Products, quantities, timelines…" />
                    <button type="submit" class="btn btn--primary btn--lg btn--block">
                        Send request <x-ui-icon name="send" :size="18" />
                    </button>
                </form>
            @endif
        </div>
    </section>
</x-layouts.app>
