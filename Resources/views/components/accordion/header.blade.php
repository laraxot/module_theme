@props(['tab' => 1])
{{--  
https://github.com/ascsoftw/tall-crud-generator/blob/main/resources/views/components/accordion-header.blade.php
    --}}

<div class="mt-2 flex flex-start">
    <span {{$attributes->merge(['class' => 'cursor-pointer text-blue-500 font-medium']) }} wire:click="showHideAccordion({{$tab}})">{{$slot}}</span>
    @if(isset($help))
    <x:tall-crud-generator::tooltip>
        {{$help}}
    </x:tall-crud-generator::tooltip>
    @endif
</div>