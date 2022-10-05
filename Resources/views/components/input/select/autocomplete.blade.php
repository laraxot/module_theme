<div class="cmp-input-autocomplete">
<div class="form-group bg-white p-3 mb-0 {{$class}}">
  <label class="label-input d-none mb-2" for="autocomplete-regioni">{{$placeholder}}</label>
  <input type="search" class="autocomplete" placeholder="{{$placeholder}}"
    id="autocomplete-regioni"
    name="autocomplete-regioni"
    data-bs-autocomplete='[{"text":"Abruzzo","link":"#"},{"text":"Basilicata","link":"#"},{"text":"Calabria","link":"#"},{"text":"Campania","link":"#"},{"text":"Emilia Romagna","link":"#"},{"text":"Friuli Venezia Giulia","link":"#"},{"text":"Lazio","link":"#"},{"text":"Liguria","link":"#"},{"text":"Lombardia","link":"#"},{"text":"Marche","link":"#"},{"text":"Molise","link":"#"},{"text":"Piemonte","link":"#"},{"text":"Puglia","link":"#"},{"text":"Sardegna","link":"#"},{"text":"Sicilia","link":"#"},{"text":"Toscana","link":"#"},{"text":"Trentino Alto Adige","link":"#"},{"text":"Umbria","link":"#"},{"text":"Valle d’Aosta","link":"#"},{"text":"Veneto","link":"#"}]'>

  
  @if($link)
    <div class="link-wrapper mt-3">
      <a class="list-item active icon-left" href="#">
        <span class="list-item-title-icon-wrapper">
          <svg class="icon icon-sm icon-primary mb-1" aria-hidden="true"><use href="../assets/bootstrap-italia/dist/svg/sprites.svg#it-map-marker"></use></svg>
        <span class="list-item-title t-primary">Usa la tua posizione</span>
          </span>
      </a>
    </div>
  @endif
  </div>
</div>

