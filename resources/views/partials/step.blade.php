@php $tag = $tag ?? 'li'; @endphp
<{{ $tag }} class="step">
    <span class="step__n">{{ $n }}</span>
    <span class="step__copy">
        <span class="step__title">{{ $s['title'] }}</span>
        <span class="step__body">{{ $s['body'] }}</span>
        <span class="step__when">{{ $s['when'] }}</span>
    </span>
</{{ $tag }}>
