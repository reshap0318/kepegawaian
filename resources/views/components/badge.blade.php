@props(['color' => 'indigo'])

@php
    $class = "inline-flex items-center justify-center px-2 py-1 text-xs font-bold leading-none text-$color-100 bg-$color-700 rounded";
@endphp

<span {{ $attributes->merge(['class' => $class]) }}>{{ $slot }}</span>

