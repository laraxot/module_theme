<div>
    @if (Auth::guest())
        <div class="flex items-center gap-x-2">
            <x-svg icon="o-thumb-up" class="w-6 h-6" />
<<<<<<< HEAD

=======
            
>>>>>>> ede0df7 (first)
            <span class="font-medium">
                {{ count($this->thread->likes()) }}
            </span>
        </div>
<<<<<<< HEAD
    @else
        <button type="button" wire:click="toggleLike" class="flex items-center gap-x-2 text-lio-500">
            <x-svg icon="o-thumb-up" class="w-6 h-6" />

            <span class="font-medium">
                {{ count($this->thread->likes()) }}
            </span>

=======
    @else 
        <button type="button" wire:click="toggleLike" class="flex items-center gap-x-2 text-lio-500">
            <x-svg icon="o-thumb-up" class="w-6 h-6" />
            
            <span class="font-medium">
                {{ count($this->thread->likes()) }}
            </span>
            
>>>>>>> ede0df7 (first)
            @if ($this->thread->isLikedBy(Auth::user()))
                <span class="text-gray-400 text-sm italic ml-1">You liked this thread</span>
            @endif
        </button>
    @endif
</div>
