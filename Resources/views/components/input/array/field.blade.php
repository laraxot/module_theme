@props([
    'name',
    'label'=>'',
    'value'=>[],
])
@php
    /*
    $value=[
        'a'=>'label a',
        'b'=>'label b',
];
//*/
$i=0;
@endphp
{{--
<livewire:input.arr type="text" :name="$name" :value="$value" :label="$label" modelId=0 />
--}}
<pre>{{ print_r($value,true)}}</pre>
<button type="button" wire:click="addArr()">+</button>
@foreach($value as $k=>$v)
    <input type="text" value="{{ $k }}" wire:model="form_data.0.options.{{ $k }}" />
    {{--
    <input type="text" value="{{ $v }}" wire:model="form_data.row.{{ $i }}.value" /> <br/>
    --}}
    @php
        $i++;
    @endphp
@endforeach
[ <pre>{{ print_r($this->form_data,true)}}</pre> ]
