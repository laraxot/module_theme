@props([
    'options'=>[],
    'arr'=>[],
    'value'=>null,
    ])
@php
    //dddx($arr);
    if(!Arr::isAssoc($options)){
        $options=array_combine($options,$options);
    }
    if(is_string($value)){
        $value=str_replace('&quot;','"',$value);
    }
    if(isJson($value)){
        $value=json_decode($value);
    }
   
@endphp

@foreach($options as $k=>$v)
    [{{ $name.'.'.$loop->index}}]
    <x-input.group type="checkbox" :name="$name.'.'.$loop->index" label="{{ $v }}" value="{{ $k }}" checked />
@endforeach
{{--
<pre>{{ print_r($form_data,true)}}</pre>
--}}
