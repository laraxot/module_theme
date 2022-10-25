<div class="form-group row">


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

</div>
