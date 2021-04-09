@props(['color' => 'blue', 'href'=>'#'])

@php
    $class = "p-1 text-$color-600 hover:bg-$color-600 hover:text-white rounded";
@endphp

@if ($href=='#')
    <button {{ $attributes->merge(['type' => 'submit', 'class' => $class]) }}>
        {{ $slot }}
    </button>
@else
    <a {{ $attributes->merge(['href' => $href, 'class' => $class]) }}>{{ $slot }}</a>
@endif

