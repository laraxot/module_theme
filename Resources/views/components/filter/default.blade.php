<div class="cmp-filter">
  <div class="filter-section">
    <h2 class="cmp-filter__title title-xxlarge" @if(isset($id_title)) id="{{$id_title}}" @endif>{{$title}}</h2>
    <div class="filter-wrapper d-flex align-items-center">

      <x-button type="advanced">
          <x-slot name="label">Filtra</x-slot>
          <x-slot name="iconBtn">it-funnel</x-slot>
          <x-slot name="class">p-0 pe-2</x-slot>
          <x-slot name="xs">true</x-slot>
          <x-slot name="class_icon">me-1</x-slot>
      <x-button>

      {{-- {{>partials/button/button label="Filtra" iconBtn="it-funnel" class="p-0 pe-2" xs=true class-icon="me-1"}} --}}
      

      <x-dropdown>
        <x-slot name="label">Ordina</x-slot>
        <x-slot name="id">id-dropdown</x-slot>
      </x-dropdown>
      
      {{-- {{>partials/dropdown/dropdown label="Ordina" id=id-dropdown}} --}}

    </div>
  </div>

  <x-input.search>
    <x-slot name="id">id-input</x-slot>
    <x-slot name="label_text">Cerca nel sito</x-slot>
    <x-slot name="placeholder_text">Cerca</x-slot>
  </x-input.search>

  {{-- {{>partials/input-search/input-search id=id-input label-text="Cerca nel sito" placeholder-text="Cerca"}} --}}
</div>
