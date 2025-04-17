<div>
@if (session()->has('message'))
    <div class="alert alert-success" style="margin-top:30px;">x
        {{ session('message') }}
    </div>
@endif
<table class="table table-bordered mt-5">
    <tr>
        @foreach($fields as $field)
            <th>{{ $field->name }}</th>
        @endforeach
        <th></th>
    </tr>
    @foreach($rows as $row)
        <tr>
            @foreach($fields as $field)
                <td>{{ $row->{$field->name} }}</td>
            @endforeach
            <td>
                <button data-toggle="modal" data-target="#updateModal" wire:click="edit({{ $row->id }})" class="btn btn-primary btn-sm">Edit</button>
                <button wire:click="delete({{ $row->id }})" class="btn btn-danger btn-sm">Delete</button>
            </td>
        </tr>
    @endforeach
</table>
</div>