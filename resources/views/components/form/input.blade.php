@props(['disabled' => false, 'type'=>'text'])

@php
    $class = "rounded-md shadow-sm border-gray-300 text-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50";
    if($type=='checkbox'){
        $class = "focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded";
    }
@endphp

<input type="{{ $type }}" {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => $class]) !!}>
