{{-- print_r($attributes->merge($arr)) --}}
{{--
dddx([
    'attributes'=>$attributes,
    'attributes_string'=>(string)$attributes->merge($arr),
    'arr'=>$arr,
    ])
--}}
{{-- {{dddx($arr)}} --}}
{{-- @if(is_array($arr))
<x-input.group {{ $attributes->merge($arr) }} ></x-input.group>
@else
<pre>{{ print_r($arr,true) }}</pre>
@endif --}}


{{-- <x-input.group {{ $attributes->merge($arr) }} ></x-input.group> --}}
@foreach($arr as $item)
    <x-input.group {{ $attributes->merge($item) }} ></x-input.group>
@endforeach