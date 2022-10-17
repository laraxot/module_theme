<div class="form-group row">
<<<<<<< HEAD
    

    <div class="col-md" style="margin-left:50px;">
        @foreach($data as $k=>$v)
            <div class="mb-3">
            <label class="form-label">{{ $prefix.$k }}</label>
            @if(is_array($v))
                @include('theme::livewire.manage.php-array',['data'=>$v,'prefix'=>$prefix.$k.'.'])
            @else
            <input class="form-control" wire:model.lazy="form_data.{{ $prefix.$k  }}"  />
            @endif
            </div>
        @endforeach
        
        @if($prefix=='')
        <button class="btn btn-primary" wire:click="save()">
            Save
        </button>
        @endif
        
    </div>
    
=======
    <div class="col-md-2 col-form-label text-md-right">
        {{ $field->label }}
    </div>

    <div class="col-md">
        @if (isset($form_data[$field->name]) && $form_data[$field->name])
            <ul class="list-group mb-2">
                @foreach ($form_data[$field->name] as $key => $value)
                    <div class="list-group-item list-group-item-action p-2">
                        <div class="form-row">

                            @foreach ($field->array_fields as $array_field)
                                @include('theme::livewire.array-fields.' . $array_field->type)
                            @endforeach

                            <div class="col-md-auto">
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
                                </button>
                            </div>
                        </div>
                    </div>
                @endforeach
            </ul>
        @endif

        <button class="btn btn-primary" wire:click="arrayAdd('{{ $field->name }}')">
            Add {{ Str::singular($field->label) }}
        </button>
        <button class="btn btn-primary" wire:click="save('{{ $field->name }}')">
            Save
        </button>

        @include('theme::livewire.fields.error-help')
    </div>
>>>>>>> ede0df7 (first)
</div>
