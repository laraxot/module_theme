<<<<<<< HEAD
{{--
=======
{{--  
>>>>>>> ede0df7 (first)
    https://github.com/ascsoftw/tall-crud-generator/blob/main/resources/views/components/table.blade.php
--}}

<table {{$attributes->merge(['class' => 'w-full whitespace-no-wrap']) }}>
    <thead>
        <tr class="text-left font-bold bg-gray-400">
            {{$header}}
        </tr>
    </thead>
    <tbody>
        {{$slot}}
    </tbody>
</table>