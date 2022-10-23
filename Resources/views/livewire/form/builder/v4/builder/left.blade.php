@foreach($comps->where('parent',null) as $comp)
    <div class="card-header ui-sortable-handle mb-2" >
        <h3 class="card-title">{{ $comp['name'] }}</h3>
        <div class="card-tools">
            <button type="button" class="btn btn-tool" wire:click="add('{{ $comp['name'] }}')">
                <i class="fas fa-plus"></i>
            </button>
        </div>
    </div>
@endforeach