
<div class="cmp-card {{class}} w-100">
  <div class="card has-bkg-grey p-3 {{class}}" >
    <div class="card-header border-0 p-0 mb-15">
      <div class="subtitle-small mb-4">{{subtitle}}</div>
    </div>
    <div class="card-body p-0">
      <form action="" id="contacts-form">
        {{>partials/input/input id="phone" type="tel" label="Telefono" placeholder="Inserisci qui il tuo telefono" text="Inserisci l’informazione per proseguire con la richiesta"}}
        {{>partials/input/input id="email" type="email" label="Email" placeholder="Inserisci qui la tua email" required=true text="Inserisci l’informazione per proseguire con la richiesta"}}
        {{>partials/input/input id="address" type="text" label="Recapito Postale" placeholder="Inserisci il tuo indirizzo" required=true address=true text="Inserisci l’informazione per proseguire con la richiesta" }}
      </form>
    </div>
    <div>
    </div>
  </div>
</div>
