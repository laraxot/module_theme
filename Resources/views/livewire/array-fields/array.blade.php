<div class="col-md">
    <ul class="list-group mb-2">
        @php
            $values = $value['value'];
            $key1 = $value['key'];
            $oldkey = $key;
        @endphp

        @foreach ($values as $k => $value)
            @php
                $key = $oldkey . '.value.' . $k;
            @endphp
            <div class="list-group-item list-group-item-action p-2">
                <div class="form-row">
                    @foreach ($field->array_fields as $array_field)
                        @include('theme::livewire.array-fields.input')
                    @endforeach
                    <div class="col-md-auto">
                        {{-- A non well formed numeric value encountered
                        @if ($field->array_sortable)
                            <button class="btn btn-sm btn-primary"
                                wire:click="arrayMoveUp('{{ $field->name }}', '{{ $key }}')">
                                <i class="fa fa-arrow-up"></i>
                            </button>

                            <button class="btn btn-sm btn-primary"
                                wire:click="arrayMoveDown('{{ $field->name }}', '{{ $key }}')">
                                <i class="fa fa-arrow-down"></i>
                            </button>
                        @endif
                        <button class="btn btn-sm btn-danger"
                            onclick="confirm('{{ __('Are you sure?') }}') || event.stopImmediatePropagation();"
                            wire:click="arrayRemove('{{ $field->name }}', '{{ $key }}')">
                            <i class="fa fa-trash-alt"></i>
                        </button> --}}
                    </div>
                </div>
            </div>
        @endforeach
    </ul>
</div>
