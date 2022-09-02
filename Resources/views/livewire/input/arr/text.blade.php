<div>
    <h3>{{ $name }}
        <button type="button" class="btn btn-primary" wire:click="addArr()"> + </button>
    </h3>
    @foreach ($form_data[$name] ?? [] as $k => $v)
        <div class="input-group" :wire:key="'group-'.$model_id">
            <input type="text" wire:model.lazy="form_data.{{ $name }}.{{ $k }}"
                value="{{ $v }}" name="{{ $name }}[]" class="form-control" />
            <button type="button" class="btn btn-danger input-group-text" wire:click="subArr({{ $k }})"
                :wire:key="'sub-arr-'.$model_id"> -
            </button>
        </div>
    @endforeach
</div>
