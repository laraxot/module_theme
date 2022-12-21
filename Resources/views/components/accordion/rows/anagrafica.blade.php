<div class="accordion-item">
  <div class="accordion-header" id="heading-{{$collapse_id}}">
    <button class="collapsed accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#{{$collapse_id}}"
      aria-expanded="false" aria-controls="{{$collapse_id}}">
      <span class="d-flex align-items-center">
      Mostra tutto
        <svg class="icon icon-primary icon-sm">
          <use href="../assets/bootstrap-italia/dist/svg/sprites.svg#it-expand"></use>
        </svg>
      </span>
    </button>


  </div>
  <div id="{{$collapse_id}}" class="accordion-collapse collapse @if(isset($acc_open)) show @endif" role="region">
    <div class="accordion-body p-0">
      @if(isset($onlyContact))
      {{>cmp-info-summary/cmp-info-summary info-title="Contatti" info=true info-list=controllare-dati-appuntamento.contatti-altro-genitore.info class="has-border" disservizio-page=true}}
      @else
      {{>cmp-info-summary/cmp-info-summary info-title="Anagrafica" info=true info-list=anagrafica-altro-genitore.info class="has-border"}}
      {{>cmp-info-summary/cmp-info-summary info-title="Indirizzi" info=true info-list=anagrafica-indirizzo-altro-genitore.info class="has-border"}}
      {{>cmp-info-summary/cmp-info-summary info-title="Contatti" info=true info-list=contatti-altro-genitore.info class="has-border"}}
      {{>cmp-info-summary/cmp-info-summary info-title="Documenti" info=true info-list=anagrafica-allegati-altro-genitore.info btn=warning class="has-border"}}
      @endif
    </div>
  </div>
</div>