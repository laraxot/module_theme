{{-- https://github.com/ascsoftw/tall-crud-generator/blob/main/resources/views/components/tag.blade.php --}}
<a {{ $attributes->merge(['class' => 'cursor-pointer text-blue-500 font-medium ml-4']) }}>
    {{ $slot }}
</a>