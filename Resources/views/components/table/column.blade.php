{{--
  https://github.com/ascsoftw/tall-crud-generator/blob/main/resources/views/components/table-column.blade.php 
--}}

<td {{$attributes->merge(['class' => 'border px-6 py-4']) }}>
    {{$slot}}
</td>