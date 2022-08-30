<div>
    <h3>{{ $name }}
        <button type="button" class="btn btn-primary" wire:click="addArr()"> + </button>
    </h3>
    @foreach ($form_data[$name] ?? [] as $k => $v)
        <div class="input-group">
            <input type="text" name="{{ $name }}[{{ $k }}]" value="{{ $v }}"
                class="form-control" @if($update_model===true) wire:input="updateModel()" @endif>
            <button type="button" class="btn btn-danger input-group-text" wire:click="subArr({{ $k }})"> -
            </button>
        </div>
    @endforeach
</div>
