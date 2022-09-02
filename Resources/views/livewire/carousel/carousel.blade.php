<div>
  <div class="btn-group btn-group-sm input-group-sm" role="group">
      <button class="btn btn-secondary" aria-label="Previous" wire:click="prev()" {{ ($i<=0)?'disabled':'' }}>
        <i class="fas fa-chevron-left"></i>
      </button>
      <span class="input-group-text">{{ $i+1 }}/{{count($items)}}</span>
      <button class="btn btn-secondary" aria-label="Next" wire:click="next()" {{ $i>=count($items)-1?'disabled':'' }}>
        <i class="fas fa-chevron-right"></i>
      </button>
    </div>
     {!! $items[$i] !!}
</div>