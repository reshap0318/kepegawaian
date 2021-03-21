@props(['active' => false, 'dropdown' => false])
@php
$class = " group flex items-center text-sm font-medium rounded-md ";
$classActive = $active ? " bg-gray-900 text-white " : " text-gray-300 hover:bg-gray-700 hover:text-white  ";
$classes = $dropdown ? $class." w-full pl-11 pr-2 py-2 ".$classActive : $class. " px-2 py-2 ".$classActive;
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
