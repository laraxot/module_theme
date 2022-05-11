<div class="input-group mb-3">
    <input class="form-control bg-transparent border-dark border-end-0" type="search" placeholder="Search here"
        aria-label="Search here" wire:model.defer="q" >
    <button class="btn btn-outline-dark border-start-0" wire:click="search()" >
        <div wire:loading wire:target="search">
            <div class="spinner-border text-success" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <div wire:loading.remove wire:target="search">
            <i class="fa fa-search text-lg"></i>
        </div>
    </button>
</div>