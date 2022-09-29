
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
        <x-input.v2>
          <x-slot name="id">phone</x-slot>
          <x-slot name="type_input">tel</x-slot>
          <x-slot name="label">Telefono</x-slot>
          <x-slot name="placeholder">Inserisci qui il tuo telefono</x-slot>
          <x-slot name="txt">Inserisci l’informazione per proseguire con la richiesta</x-slot>
        </x-input.v2>

        <x-input.v2>
          <x-slot name="id">email</x-slot>
          <x-slot name="type_input">email</x-slot>
          <x-slot name="label">Email</x-slot>
          <x-slot name="required">{{ true }}</x-slot>
          <x-slot name="placeholder">Inserisci qui la tua email</x-slot>
          <x-slot name="txt">Inserisci l’informazione per proseguire con la richiesta</x-slot>
        </x-input.v2>

        <x-input.v2>
          <x-slot name="id">address</x-slot>
          <x-slot name="type_input">text</x-slot>
          <x-slot name="label">Recapito Postale</x-slot>
          <x-slot name="required">{{ true }}</x-slot>
          <x-slot name="placeholder">Inserisci il tuo indirizzo</x-slot>
          <x-slot name="txt">Inserisci l’informazione per proseguire con la richiesta</x-slot>
        </x-input.v2>


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
