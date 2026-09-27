@props(['name', 'label' => null, 'type' => 'text', 'icon' => null, 'bag' => 'default', 'value' => null])
@php
    $id = $attributes->get('id', $bag === 'default' ? $name : "{$bag}-{$name}");
    $error = $errors->getBag($bag)->first($name);
@endphp
<div class="field">
    @if ($label)
        <label class="field__label" for="{{ $id }}">{{ $label }}</label>
    @endif
    <div @class(['control', 'control--textarea' => $type === 'textarea', 'control--invalid' => $error])>
        @if ($icon)<x-ui-icon :name="$icon" :size="18" />@endif
        @if ($type === 'textarea')
            <textarea id="{{ $id }}" name="{{ $name }}" rows="4" @if ($error) aria-invalid="true" aria-describedby="{{ $id }}-error" @endif {{ $attributes->except('id') }}>{{ old($name, $value) }}</textarea>
        @else
            <input id="{{ $id }}" type="{{ $type }}" name="{{ $name }}" value="{{ old($name, $value) }}" @if ($error) aria-invalid="true" aria-describedby="{{ $id }}-error" @endif {{ $attributes->except('id') }}>
        @endif
    </div>
    @if ($error)
        <span class="field__error" id="{{ $id }}-error">{{ $error }}</span>
    @endif
</div>
