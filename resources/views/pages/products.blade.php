<x-layouts.app title="Products & Materials" description="Browse Rashee Enterprises' catalog of fasteners, fabricated parts, raw materials and packaging, and build a quote request.">
    <x-page-hero eyebrow="Catalog" title="Products & Materials">
        <button type="button" class="btn btn--primary" data-dialog-open="quote-dialog">
            <x-ui-icon name="file-text" :size="18" /> My quote ({{ $quote->count() }})
        </button>
    </x-page-hero>

    <div class="container catalog">
        {{-- Filters --}}
        <form class="filters" method="GET" action="{{ route('products') }}" data-filters role="search">
            <div class="field">
                <label class="sr-only" for="catalog-search">Search products</label>
                <div class="control">
                    <x-ui-icon name="search" :size="18" />
                    <input id="catalog-search" type="search" name="q" value="{{ $search }}" placeholder="Search products…">
                </div>
            </div>

            <fieldset>
                <legend class="filters__title">Category</legend>
                <div class="filters__options">
                    @foreach ($categories as $category)
                        <label class="checkbox">
                            <input type="checkbox" name="category[]" value="{{ $category }}" @checked(in_array($category, $active))>
                            {{ $category }}
                        </label>
                    @endforeach
                </div>
            </fieldset>

            <x-select name="sort" label="Sort by" :options="$sorts" :value="$sort" />

            <button type="submit" class="btn btn--outline btn--sm filters__apply">Apply filters</button>
        </form>

        {{-- Results --}}
        <div>
            <div class="catalog__toolbar">
                <span class="catalog__count">{{ $products->count() }} {{ Str::plural('product', $products->count()) }}</span>
                @foreach ($active as $category)
                    <a class="tag" href="{{ route('products', array_filter(['q' => $search ?: null, 'sort' => $sort !== 'popularity' ? $sort : null, 'category' => array_values(array_diff($active, [$category]))])) }}" aria-label="Remove {{ $category }} filter">
                        {{ $category }} <x-ui-icon name="x" :size="12" />
                    </a>
                @endforeach
                @if ($active || $search !== '')
                    <a class="link-btn" href="{{ route('products') }}">Clear all</a>
                @endif
            </div>

            <div class="catalog__grid">
                @forelse ($products as $product)
                    @php $inQuote = $quote->has($product['slug']); @endphp
                    <article class="card card--interactive">
                        <div class="card__media card__media--muted"><x-ui-icon :name="$product['icon']" :size="38" /></div>
                        <div class="card__body">
                            <x-badge :tone="$product['stock'][1]" dot>{{ $product['stock'][0] }}</x-badge>
                            <h2 class="product-name" style="font-family:var(--font-body);margin-bottom:0">{{ $product['name'] }}</h2>
                            <div class="product-meta">{{ $product['category'] }}</div>
                            <div class="product-foot">
                                <span class="price">${{ number_format($product['price'], 2) }}<small> /unit</small></span>
                                <form method="POST" action="{{ route('quote.add', $product['slug']) }}">
                                    @csrf
                                    <button type="submit" @class(['btn', 'btn--sm', 'btn--outline' => $inQuote, 'btn--primary' => ! $inQuote]) @disabled($inQuote)>
                                        {{ $inQuote ? 'Added' : 'Add' }}<span class="sr-only"> {{ $product['name'] }} to quote</span>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </article>
                @empty
                    <div class="catalog__empty">
                        No products match your filters. <a href="{{ route('products') }}">Clear all</a>
                    </div>
                @endforelse
            </div>
        </div>
    </div>

    @include('partials.quote-dialog')
</x-layouts.app>
