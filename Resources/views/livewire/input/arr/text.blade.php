<div>
    <h3>{{ $name }}
        <button type="button" class="btn btn-primary" wire:click="addArr()"> + </button>
    </h3>
    @foreach ($form_data[$name] ?? [] as $k => $v)
        <input type="text" name="{{ $name }}[{{ $k }}]" value="{{ $v }}">
        <button type="button" class="btn btn-danger" wire:click="subArr({{ $k }})"> - </button>
    @endforeach
</div>
