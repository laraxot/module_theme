@foreach($form_data as $k=>$row)

<div class="card-header ui-sortable-handle mb-2 {{ $edit_k == $k?'bg-info':'' }}">
    <div class="card-tools">
        <div class="btn-group" role="group" aria-label="Basic example">
            <button type="button" class="btn btn-tool btn-info" wire:click="edit({{$k}})">
                <i class="fas fa-edit"></i>
            </button>
            <button type="button" class="btn btn-tool btn-danger" wire:click="delete({{$k}})">
                <i class="fas fa-trash"></i>
            </button>
        </div>
    </div>
    <div class="card-body" >
        <x-input.group type="{{ $row['type'] }}" name="{{ $row['name'] }}" />
    </div>

</div>



@endforeach