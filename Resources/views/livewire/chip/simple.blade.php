<div>
  {{--  
  [[
<input type="text" class="form-control" wire:model.lazy="tag" wire:keydown.enter="add()">{{ $tag }}
  ]] 
  --}}
  <form wire:submit.prevent="add">
    <input type="text" class="form-control" wire:model="tag">{{ $tag }}
  </form>
</div>