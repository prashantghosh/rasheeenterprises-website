@props(['name', 'size' => 20])
{{ svg('lucide-'.$name, 'icon', [
    'width' => $size,
    'height' => $size,
    'aria-hidden' => 'true',
    'focusable' => 'false',
    ...$attributes->getAttributes(),
]) }}
