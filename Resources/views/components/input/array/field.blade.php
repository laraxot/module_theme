@props([
    'name',
    'label'=>'',
    'value'=>[],
])
<livewire:input.arr type="text" :name="$name" :value="$value" :label="$label" modelId=0 />