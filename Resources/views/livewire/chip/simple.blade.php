<div>
<<<<<<< HEAD
  {{--
  [[
<input type="text" class="form-control" wire:model.lazy="tag" wire:keydown.enter="add()">{{ $tag }}
  ]]
=======
  {{--  
  [[
<input type="text" class="form-control" wire:model.lazy="tag" wire:keydown.enter="add()">{{ $tag }}
  ]] 
>>>>>>> ede0df7 (first)
  --}}
  <form wire:submit.prevent="add">
    <input type="text" class="form-control" wire:model="tag">{{ $tag }}
  </form>
</div>