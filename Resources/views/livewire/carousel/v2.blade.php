<div>
    <p>{!! $items[$i]['txt'] ?? '' !!}</p>
    <button class="btn btn-circle btn-soft-primary btn-sm mx-2 mx-md-0" wire:click="prev()"
        {{ $i <= 0 ? 'disabled' : '' }}><i class="uil uil-angle-left-b"></i></button>
    <span class="badge badge-lg bg-primary rounded-pill">
        Citazioni
        <span class="badge badge-lg bg-pale-grape text-grape rounded-pill">{{ $i + 1 }}/{{ count($items) }}</span>
    </span>
    <button class="btn btn-circle btn-soft-primary btn-sm mx-2 mx-md-0" wire:click="next()"
        {{ $i >= count($items) - 1 ? 'disabled' : '' }}><i class="uil uil-angle-right-b"></i></button>
</div>