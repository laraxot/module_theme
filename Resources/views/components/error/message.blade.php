{{--  
    https://github.com/ascsoftw/tall-crud-generator/blob/main/resources/views/components/error-message.blade.php
    --}}
<span {{$attributes->merge(['class' => 'text-red-500 font-medium italic']) }}>
    {{$slot}}
</span>