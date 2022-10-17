<div>
    <livewire:input.arr type="elastic.filter" name="filter" :value="$value" label="Criteria"
        modelId="{{ $model_id ?? 1 }}"  :wire:key="'input-arr-'.$model_id"/>

</div>