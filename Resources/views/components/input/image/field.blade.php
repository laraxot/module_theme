<div {{ $attributes->class([]) }}>
    <label {{ $label->attributes()->class([]) }}>Immagini</label>
    <div class="upload-wrapper d-flex justify-content-between align-items-center">
      <img src="../assets/images/img-disservizio-thumbnail.png" alt="" class=" img" />
      <span class="t-primary fw-bold w-100 ms-2">6yhakandsahm413d8.jpg</span>
      <a href="#" class="align-self-center" aria-label="elimina immagina caricata">
        <svg class="icon icon-primary icon-sm mb-1 ">
          <use href="../assets/bootstrap-italia/dist/svg/sprites.svg#it-close"></use>
        </svg>
      </a>
    </div>
    <hr>
    {{-- <x-button type="simple2">Upload</x-button> --}}
    {{-- {{> partials/button/button label="Carica file" primary=true iconBtn="it-upload" iconWhite=true sm=true
    class="w-100 fw-bold" aria-label="Carica file per il disservizio"}} --}}
    <p class="title-xsmall u-grey-dark pt-10 mb-0">Seleziona una o più immagini da allegare alla
      segnalazione
    </p>
</div>