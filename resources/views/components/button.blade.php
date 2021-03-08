@props(['color' => 'gray', 'href'=>'#', 'px' => 4, 'py'=>2])

@php
    $class = "inline-flex items-center px-$px py-$py bg-$color-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-$color-700 active:bg-$color-900 focus:outline-none focus:border-$color-900  disabled:opacity-25 transition ease-in-out duration-150";
@endphp

@if ($href=='#')
    <button {{ $attributes->merge(['type' => 'submit', 'class' => $class]) }}>
        {{ $slot }}
    </button>
@else
    <a {{ $attributes->merge(['href' => $href, 'class' => $class]) }}>{{ $slot }}</a>
@endif

