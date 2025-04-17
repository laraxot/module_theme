@php
    //https://italia.github.io/bootstrap-italia/docs/form/input/#input-con-risultato-ricerca-o-autocompletamento

    /*
    <div class="form-group">
        <input type="search" class="autocomplete" placeholder="Testo da cercare"
            id="autocomplete-one"
            name="autocomplete-one"
            data-autocomplete="[]">
        <span class="autocomplete-icon" aria-hidden="true">
            <svg class="icon icon-sm"><use xlink:href="/bootstrap-italia/dist/svg/sprite.svg#it-search"></use></svg>
        </span>
        <ul class="autocomplete-list" id="testAutocomplete1">
            <li>
            <a href="#">
                <div class="avatar size-sm">
                <img src="https://randomuser.me/api/portraits/women/44.jpg" alt="Luisa Neri">
                </div>
                <span class="autocomplete-list-text">
                <span>List <mark>Ite</mark>m</span><em>Label</em>
                </span>
            </a>
            </li>
            <li>
            <a href="#">
                <div class="avatar size-sm">
                <img src="https://randomuser.me/api/portraits/men/46.jpg"
                    alt="Mario Rossi">
                </div>
                <span class="autocomplete-list-text">
                <span>List <mark>Ite</mark>m</span><em>Label</em>
                </span>
            </a>
            </li>
            <li>
            <a href="#">
                <svg class="icon icon-sm">
                <use xlink:href="/bootstrap-italia/dist/svg/sprite.svg#it-file"></use>
                </svg>
                <span class="autocomplete-list-text">
                <span>List <mark>Ite</mark>m</span><em>Label</em>
                </span>
            </a>
            </li>
            <li>
            <a href="#">
                <svg class="icon icon-sm">
                <use xlink:href="/bootstrap-italia/dist/svg/sprite.svg#it-file"></use>
                </svg>
                <span class="autocomplete-list-text">
                <span>List <mark>Ite</mark>m</span><em>Label</em>
                </span>
            </a>
            </li>
            <li>
            <a href="#">
                <svg class="icon icon-sm">
                <use xlink:href="/bootstrap-italia/dist/svg/sprite.svg#it-file"></use>
                </svg>
                <span class="autocomplete-list-text">
                <span>List <mark>Ite</mark>m</span><em>Label</em>
                </span>
            </a>
            </li>
        </ul>
        <label for="autocomplete-one" class="sr-only">Cerca nel sito</label>
    </div>
    */

    Theme::add($comp_ns.'/css/autocomplete.scss');
@endphp


<div class="form-group">
  <input type="search" class="autocomplete" placeholder="Testo da cercare"
    id="autocomplete-one"
    name="autocomplete-one"
    data-autocomplete="[]">
  <span class="autocomplete-icon" aria-hidden="true">
    <svg class="icon icon-sm"><use xlink:href="/bootstrap-italia/dist/svg/sprite.svg#it-search"></use></svg>
  </span>
  <ul class="autocomplete-list" id="testAutocomplete1">
    <li>
      <a href="#">
        <div class="avatar size-sm">
          <img src="https://randomuser.me/api/portraits/women/44.jpg" alt="Luisa Neri">
        </div>
        <span class="autocomplete-list-text">
          <span>List <mark>Ite</mark>m</span><em>Label</em>
        </span>
      </a>
    </li>
    <li>
      <a href="#">
        <div class="avatar size-sm">
          <img src="https://randomuser.me/api/portraits/men/46.jpg"
               alt="Mario Rossi">
        </div>
        <span class="autocomplete-list-text">
          <span>List <mark>Ite</mark>m</span><em>Label</em>
        </span>
      </a>
    </li>
    <li>
      <a href="#">
        <svg class="icon icon-sm">
          <use xlink:href="/bootstrap-italia/dist/svg/sprite.svg#it-file"></use>
        </svg>
        <span class="autocomplete-list-text">
          <span>List <mark>Ite</mark>m</span><em>Label</em>
        </span>
      </a>
    </li>
    <li>
      <a href="#">
        <svg class="icon icon-sm">
          <use xlink:href="/bootstrap-italia/dist/svg/sprite.svg#it-file"></use>
        </svg>
        <span class="autocomplete-list-text">
          <span>List <mark>Ite</mark>m</span><em>Label</em>
        </span>
      </a>
    </li>
    <li>
      <a href="#">
        <svg class="icon icon-sm">
          <use xlink:href="/bootstrap-italia/dist/svg/sprite.svg#it-file"></use>
        </svg>
        <span class="autocomplete-list-text">
          <span>List <mark>Ite</mark>m</span><em>Label</em>
        </span>
      </a>
    </li>
  </ul>
  <label for="autocomplete-one" class="sr-only">Cerca nel sito</label>
</div>