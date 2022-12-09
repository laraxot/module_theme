<div class="cmp-filter">
  <div class="filter-section">
    <h2 class="cmp-filter__title title-xxlarge" @if(isset($id_title)) id="{{$id_title}}" @endif >{{$title}}</h2>
    <div class="filter-wrapper d-flex align-items-center">

      <x-button type="advanced" class="p-0 pe-2" iconBtn="it-funnel" :xs="true"
      class_icon="me-1">
          <x-slot name="label">Filtra</x-slot>
      </x-button>


      <x-dropdown>
        <x-slot name="label">Ordina</x-slot>
        <x-slot name="id">id-dropdown</x-slot>
      </x-dropdown>

    </div>
  </div>

  <x-input.search id="id-input" placeholder="Cerca" label="Cerca nel sito">
    <x-slot name="wrapper"></x-slot>
  </x-input.search>

</div>
