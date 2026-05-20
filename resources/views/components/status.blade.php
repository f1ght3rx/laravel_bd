@props(['type'])

@php
$classes = match ($type) {
    1 => 'text-blue-600',
    2 => 'text-green-600',
    3 => 'text-red-600',
    default => 'text-slate-600',
};
@endphp

<span {{ $attributes->merge(['class' => 'text-base ' . $classes]) }}>
    {{ $slot }}
</span>
