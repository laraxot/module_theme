<div>
    <div class="w-100 mb-3">
        <h3 class="float-left">{{ $label ?? $name }}</h3>
        <button type="button" class="btn btn-primary float-right" wire:click="addArr()">+</button>
    </div>
    @foreach ($form_data[$name] ?? [] as $k => $v)
        @php
            $input_name=''.$name.'['.$k.']';
            $wire_name='form_data.'.$name.'.'.$k;
        @endphp
    <div class="input-group mb-3">
        <select class="form-select" name="{{ $input_name }}[criteria]" wire:model.lazy="{{ $wire_name }}.criteria">
            <option value="must">Must</option>
            <option value="mustNot">Must NOT</option>
            <option value="should">Should</option>
        </select>
        
        <input type="text" class="form-control" name="{{ $input_name }}[q]" wire:model.lazy="{{ $wire_name }}.q" />

        
        <div class="input-group-text">
            <input class="form-check-input mt-0" type="checkbox" name="{{ $input_name }}[fuzzy]" 
            wire:model.lazy="{{ $wire_name }}.fuzzy"
            aria-label="Checkbox for following text input" />
        </div>

        <button type="button" class="btn btn-danger input-group-text" wire:click="subArr({{ $k }})"
            :wire:key="'sub-arr-'.$model_id"> -
        </button>
        
        
    </div>
    @endforeach
</div>