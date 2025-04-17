{{-- print_r($attributes->merge($arr)) --}}
{{-- {{ dddx(get_defined_vars()) }}
@php
    dddx([
        'attributes' => $attributes,
        'attributes_string' => (string) $attributes->merge($arr),
        'arr' => $arr,
    ]);
@endphp --}}

{{-- {{ dddx($arr) }} --}}
{{-- @if (is_array($arr))
<x-input.group {{ $attributes->merge($arr) }} ></x-input.group>
@else
<pre>{{ print_r($arr,true) }}</pre>
@endif --}}


{{-- <x-input.group {{ $attributes->merge($arr) }} ></x-input.group> --}}
@foreach ($arr as $item)
    <x-input.group {{ $attributes->merge($item) }}></x-input.group>


    {{-- @if (isset($item['options']))
        <x-input.group :type="$item['type']" :name="$item['name']" :id="$item['id']" col_size="12" :label="$item['name']"
            :options="$item['options']" />
    @else
        <x-input.group :type="$item['type']" :name="$item['name']" :id="$item['id']" col_size="12" :label="$item['name']" />
    @endif --}}
@endforeach
