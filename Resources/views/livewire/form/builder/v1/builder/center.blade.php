<div wire:sortable="updateInputOrder">
@foreach($form_data as $k=>$row)
<div class="card-header ui-sortable-handle mb-2 {{ $edit_k == $k?'bg-info':'' }}" wire:sortable.item="{{ $k }}" wire:key="input-{{ $k }}">
    <div class="card-tools" >
        <div class="btn-group" role="group" aria-label="Basic example">
            <button type="button" class="btn btn-tool btn-info" wire:click="edit({{$k}})">
                <i class="fas fa-edit"></i>
            </button>
            <button type="button" class="btn btn-tool btn-danger" wire:click="delete({{$k}})">
                <i class="fas fa-trash"></i>
            </button>
            <span type="button" class="btn btn-tool btn-success" style="cursor: move;" wire:sortable.handle>
                <i class="fas fa-arrows"></i>
            </span>
        </div>
    </div>
    <div class="card-body" >
        {{--  
        <x-input.group type="{{ $row['type'] }}" name="{{ $row['name'] }}" /> 
        --}}
        @php
            $attributes=app(\Illuminate\View\ComponentAttributeBag::class);
            $row=collect($row)->map(function($item){
                if(is_array($item)){
                    return json_encode($item);
                }
                return $item;
            })->all();
        @endphp
        {{-- 
        <pre>{{ print_r($row,true) }}</pre>
        --}}
          
        <x-input.group {{ $attributes->merge($row) }} />
        
        {{--  
        <x-input.group.arr :arr="$row" />
        --}}
        
    </div>
    
</div>
@endforeach
</div>