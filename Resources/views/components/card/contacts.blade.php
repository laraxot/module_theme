
<div class="cmp-card {{$class ?? ''}} w-100">
  <div class="card has-bkg-grey p-3 {{$class ?? ''}}" >
    <div class="card-header border-0 p-0 mb-15">
      <div class="subtitle-small mb-4">{{$subtitle ?? ''}}</div>
    </div>
    <div class="card-body p-0">
      <form action="" id="contacts-form">


        {{-- <x-input id="phone" type_input="tel"
          label="Telefono" placeholder="Inserisci qui il tuo telefono"
          txt="Inserisci l’informazione per proseguire con la richiesta"
          >
        </x-input> --}}
        <x-input>
          <x-slot name="id">id</x-slot>
          <x-slot name="type_input">tel</x-slot>
          <x-slot name="label">Telefono</x-slot>
          <x-slot name="placeholder">Inserisci qui il tuo telefono</x-slot>
          <x-slot name="txt">Inserisci l’informazione per proseguire con la richiesta</x-slot>
        </x-input>


        {{-- {{>partials/input/input id="phone" type="tel" label="Telefono" placeholder="Inserisci qui il tuo telefono" text="Inserisci l’informazione per proseguire con la richiesta"}}
        {{>partials/input/input id="email" type="email" label="Email" placeholder="Inserisci qui la tua email" required=true text="Inserisci l’informazione per proseguire con la richiesta"}}
        {{>partials/input/input id="address" type="text" label="Recapito Postale" placeholder="Inserisci il tuo indirizzo" required=true address=true text="Inserisci l’informazione per proseguire con la richiesta" }}
       --}}
      </form>
    </div>
    <div>
    </div>
  </div>
</div>
