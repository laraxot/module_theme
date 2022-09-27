<div class="cmp-filter">
  <div class="filter-section">
    <h2 class="cmp-filter__title title-xxlarge" {{#if id-title}}id="{{id-title}}"{{/if}}>{{title}}</h2>
    <div class="filter-wrapper d-flex align-items-center">
      {{>partials/button/button label="Filtra" iconBtn="it-funnel" class="p-0 pe-2" xs=true class-icon="me-1"}}
      {{>partials/dropdown/dropdown label="Ordina" id=id-dropdown}}
    </div>
  </div>
  {{>partials/input-search/input-search id=id-input label-text="Cerca nel sito" placeholder-text="Cerca"}}
</div>
