@props(['contentPadding' => true, 'onSubmit' => false])
<form @if($onSubmit) wire:submit.prevent="{{ $onSubmit }}" @endif>
    <div class="modal-header mt-5 mx-8">
        @if($title ?? false)
            <h4 class="modal-title">{{ $title }}</h4>
        @endif
        <button type="button" class="btn-close" wire:click="$emit('modal.close')" aria-label="Close"></button>
    </div>
    <div @class(['modal-body' , 'px-0 py-0 mx-8 my-2' => !$contentPadding])>
        {{ $body }}
    </div>
    @if($footer ?? false)
        <div class="modal-footer mb-5">
            {{ $footer }}
        </div>
    @endif

</form>
