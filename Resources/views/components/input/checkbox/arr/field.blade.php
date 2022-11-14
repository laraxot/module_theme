@props(['options'=>[]])
@php
    if(!Arr::isAssoc($options)){
        $options=array_combine($options,$options);
    }
@endphp

@foreach($options as $k=>$v)
    <x-input.group type="checkbox" :name="$name.'.'.$loop->index" label="{{ $v }}" value="{{ $k }}"/>
@endforeach