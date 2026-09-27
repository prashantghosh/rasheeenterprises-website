@props(['name', 'label' => null, 'options' => [], 'value' => null, 'placeholder' => null])
@php
    $id = $attributes->get('id', $name);
    $error = $errors->first($name);
    $current = old($name, $value);
@endphp
<div class="field">
    @if ($label)
        <label class="field__label" for="{{ $id }}">{{ $label }}</label>
    @endif
    <div @class(['control', 'control--select', 'control--invalid' => $error])>
        <select id="{{ $id }}" name="{{ $name }}" {{ $attributes->except('id') }}>
            @if ($placeholder)
                <option value="" @selected($current === null || $current === '')>{{ $placeholder }}</option>
            @endif
            @foreach ($options as $optValue => $optLabel)
                @php $optValue = array_is_list($options) ? $optLabel : $optValue; @endphp
                <option value="{{ $optValue }}" @selected((string) $current === (string) $optValue)>{{ $optLabel }}</option>
            @endforeach
        </select>
        <x-ui-icon name="chevron-down" :size="16" />
    </div>
    @if ($error)
        <span class="field__error">{{ $error }}</span>
    @endif
</div>
