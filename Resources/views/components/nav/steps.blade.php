@props(['save', 'saveBtn', 'next' => false])

<div class="cmp-nav-steps">
    <nav class="steppers-nav">
        <button wire:click="previous()" type="button"
            class="btn btn-sm steppers-btn-prev p-0 @if (isset($btn_back_step)) btn-back-step @endif">
            <svg class="icon icon-primary icon-sm" aria-hidden="true">
                <use href="../assets/bootstrap-italia/dist/svg/sprites.svg#it-chevron-left"></use>
            </svg>
            <span class="text-button-sm t-primary">Indietro</span>
        </button>


        @if (isset($saveBtn))
            <button type="button"
                class="btn btn-outline-primary bg-white btn-sm steppers-btn-save d-none d-lg-block saveBtn">
                <span class="text-button-sm t-primary">Salva Richiesta</span>
            </button>


            <button wire:click="save()" type="button"
                class="btn btn-outline-primary bg-white btn-sm steppers-btn-save d-block d-lg-none saveBtn center">
                <span class="text-button-sm t-primary">Salva</span>
            </button>
        @endif


        @if ($next)
            <button wire:click="save()" @if (isset($validate)) type="submit" @else type="button" @endif
                class="btn btn-primary btn-sm steppers-btn-confirm send"
                @if (isset($validate)) data-bs-validate="validate"
      @else data-bs-toggle="modal" @if (isset($modalId)) data-bs-target="#{{ $modalId }}" @endif
                @endif>
                <span class="text-button-sm">Invia</span>
                @if (isset($icon))
                    {{ $icon }}
                @endif
            </button>
        @else
            <button wire:click="acconsento()" @if (isset($validate)) type="submit" @else type="button" @endif
                class="btn btn-primary btn-sm steppers-btn-confirm @if (isset($btn_next_step)) btn-next-step @endif "
                @if (isset($validate)) data-bs-validate="validate" @else data-bs-toggle="modal" @if (isset($modalId)) data-bs-target="#{{ $modalId }}" @endif
                @endif>
                <span class="text-button-sm">Avanti</span>
                <svg class="icon icon-white icon-sm" aria-hidden="true">
                    <use href="../assets/bootstrap-italia/dist/svg/sprites.svg#it-chevron-right"></use>
                </svg>
            </button>
        @endif
    </nav>
    <x-disclaimer></x-disclaimer>

</div>
