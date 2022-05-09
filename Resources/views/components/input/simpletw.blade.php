@props(['disabled' => false])
{{--  
https://github.com/ascsoftw/tall-crud-generator/blob/main/resources/views/components/input.blade.php
--}}

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50']) !!}>
