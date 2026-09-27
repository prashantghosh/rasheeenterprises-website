<nav class="rs-nav" aria-label="Main">
    @foreach (config('rashee.nav') as $item)
        @php $current = request()->routeIs($item['match']); @endphp
        @if (! empty($item['menu']))
            <div class="dropdown">
                <a href="{{ route($item['route']) }}" class="rs-nav__toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false"{!! $current ? ' aria-current="page"' : '' !!}>
                    {{ $item['label'] }} <x-ui-icon name="chevron-down" :size="16" />
                </a>
                <ul class="dropdown-menu rs-menu">
                    @foreach ($item['menu'] as [$label, $route, $params])
                        <li><a class="dropdown-item" href="{{ route($route, $params) }}">{{ $label }}</a></li>
                    @endforeach
                </ul>
            </div>
        @else
            <a href="{{ route($item['route']) }}"{!! $current ? ' aria-current="page"' : '' !!}>{{ $item['label'] }}</a>
        @endif
    @endforeach
</nav>
