@php
    $items = $quote->products();
    $openOnLoad = session('open_quote') || $errors->quote->any();
@endphp
<dialog id="quote-dialog" class="dialog" aria-labelledby="quote-dialog-title" @if ($openOnLoad) data-open-on-load @endif>
    <div class="dialog__head">
        <div>
            <h2 id="quote-dialog-title">Your quote request</h2>
            <p>{{ $items->isNotEmpty() ? $items->count().' item(s) ready to send.' : 'Add products to build a quote.' }}</p>
        </div>
        <button type="button" class="icon-btn" data-dialog-close aria-label="Close">
            <x-ui-icon name="x" :size="16" />
        </button>
    </div>

    <div class="dialog__body">
        @if ($items->isNotEmpty())
            <ul class="quote-list">
                @foreach ($items as $item)
                    <li>
                        <span>{{ $item['name'] }}</span>
                        <form method="POST" action="{{ route('quote.remove', $item['slug']) }}">
                            @csrf
                            @method('DELETE')
                            <button type="submit" aria-label="Remove {{ $item['name'] }}"><x-ui-icon name="x" :size="16" /></button>
                        </form>
                    </li>
                @endforeach
            </ul>

            <form id="quote-form" class="form-grid" method="POST" action="{{ route('quote.submit') }}">
                @csrf
                <div class="form-row">
                    <x-input bag="quote" name="first_name" label="First name" placeholder="Jordan" autocomplete="given-name" required />
                    <x-input bag="quote" name="last_name" label="Last name" placeholder="Rivera" autocomplete="family-name" />
                </div>
                <x-input bag="quote" name="email" type="email" label="Work email" placeholder="you@company.com" icon="mail" autocomplete="email" required />
                <x-input bag="quote" name="company" label="Company" placeholder="Acme Industrial" autocomplete="organization" />
                <x-input bag="quote" name="message" type="textarea" label="Quantities or notes (optional)" placeholder="e.g. 5,000 units, delivery by March" />
            </form>
        @else
            <span class="muted" style="font-size:var(--text-sm)">No items yet.</span>
        @endif
    </div>

    <div class="dialog__foot">
        <button type="button" class="btn btn--ghost" data-dialog-close>Keep browsing</button>
        <button type="submit" form="quote-form" class="btn btn--primary" @disabled($items->isEmpty())>Send request</button>
    </div>
</dialog>
