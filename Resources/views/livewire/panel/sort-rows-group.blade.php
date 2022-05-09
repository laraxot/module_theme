<div>
    <div>
        @if (session()->has('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
        @endif
    </div>
    <a href="{{ $this->panel->url('index') }}" class="btn btn-info">&laquo; Back</a>


    <div wire:sortable="updateGroupOrder" wire:sortable-group="updateTaskOrder" {{-- style="display: flex" --}}>
        @foreach ($groups->sortBy('items.pos') as $key => $group)
            <div wire:key="group-{{ $key }}" wire:sortable.item="{{ $key }}"
                style="border:1px solid darkgreen;">
                <div style="display: flex">
                    <h4 wire:sortable.handle>{{ $key }}</h4>
                </div>

                <ul wire:sortable-group.item-group="{{ $key }}">
                    @foreach ($group as $row)
                        <li wire:key="task-{{ $row->id }}" wire:sortable-group.item="{{ $row->id }}">
                            [{{ $row->pos }}] {!! $this->panel->optionLabel($row) !!}
                        </li>
                    @endforeach
                </ul>
            </div>
        @endforeach
    </div>

</div>

@push('scripts')
    <script src="https://cdn.jsdelivr.net/gh/livewire/sortable@v0.x.x/dist/livewire-sortable.js"></script>
@endpush
