{{-- Industry tile (Homepage / Industries). Hover reveals the specification note on desktop. --}}
<a class="ind h-100" href="{{ $href }}" @isset($select) data-sector-tile="{{ $ind['slug'] }}" @endisset>
    <span class="ind__art" style="background:linear-gradient(140deg,{{ $ind['tone'] }} 0%,#eef2f5 100%)"></span>
    <span class="ind__body">
        <span class="ind__name"><x-ui-icon :name="$ind['icon']" :size="19" /> {{ $ind['name'] }}</span>
        <span class="ind__spec">{{ $ind['spec'] }}</span>
    </span>
    <span class="ind__reveal" aria-hidden="true">
        <strong>{{ $ind['name'] }}</strong>
        <span>{{ $ind['reveal'] }}</span>
        <em>Read the spec <x-ui-icon name="arrow-right" :size="16" /></em>
    </span>
</a>
