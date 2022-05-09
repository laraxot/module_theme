@props(['value'])
{{--  
    https://github.com/ascsoftw/tall-crud-generator/blob/main/resources/views/components/label.blade.php
    --}}

<label {{ $attributes->merge(['class' => 'block font-medium text-sm text-gray-700']) }}>
    {{ $value ?? $slot }}
</label>