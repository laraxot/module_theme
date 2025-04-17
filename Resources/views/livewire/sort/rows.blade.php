<div>
    <ul wire:sortable="updateRowOrder">
        @foreach ($rows as $row)
            <li wire:sortable.item="{{ $row->id }}" wire:key="row-{{ $row->id }}">
                {{--
                <span wire:sortable.handle>{{ $row->name }} [{{$row->order_column }}] </span>

                <button wire:click="removeRow({{ $row->id }})">Remove</button>
                --}}
                <div class="input-group mb-3">
                    <button class="btn btn-outline-secondary" type="button"  wire:sortable.handle>
                        <i class="fas fa-arrows-alt-v"></i>
                    </button>

                    <button class="btn btn-outline-secondary" type="button" wire:click="moveUp({{ $row->id }})" {{ $row->isFirstInOrder()?'disabled':'' }}>
                        <i class="fas fa-sort-up"></i>
                    </button>
                    <button class="btn btn-outline-secondary" type="button" wire:click="moveDown({{ $row->id }})" {{ $row->isLastInOrder()?'disabled':'' }} >
                        <i class="fas fa-sort-down"></i>
                    </button>

                    <span class="input-group-text">{{ $row->name }}</span>

                </div>
            </li>
        @endforeach
    </ul>
</div>
@push('scripts')
<script src="https://cdn.jsdelivr.net/gh/livewire/sortable@v0.x.x/dist/livewire-sortable.js"></script>
@endpush