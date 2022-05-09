<div>
    <div class="bg-light">
        {!! $html !!}
    </div>

    @if ($n > 0)
        <div class="text-center">
            <button class="btn btn-primary" wire:click="goPrev()" @if ($this->isDisabled['prev']) disabled @endif>
                <i class="fas fa-angle-double-left"></i>
            </button>
            <button class="btn btn-primary" wire:click="goNext()" @if ($this->isDisabled['next']) disabled @endif>
                <i class="fas fa-angle-double-right"></i>
            </button>
        </div>
    @endif
</div>
