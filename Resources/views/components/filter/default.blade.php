<div class="cmp-filter">
  <div class="filter-section">
    <h2 class="cmp-filter__title title-xxlarge" @if(isset($id_title)) id="{{$id_title}}" @endif >{{$title}}</h2>
    <div class="filter-wrapper d-flex align-items-center">

      <x-button type="advanced">
          <x-slot name="label">Filtra</x-slot>
          <x-slot name="iconBtn">it-funnel</x-slot>
          <x-slot name="class">p-0 pe-2</x-slot>
          <x-slot name="xs">true</x-slot>
          <x-slot name="class_icon">me-1</x-slot>
      <x-button>


      <x-dropdown>
        <x-slot name="label">Ordina</x-slot>
        <x-slot name="id">id-dropdown</x-slot>
      </x-dropdown>
      
    </div>
  </div>

  <x-input.search>
    <x-slot name="id">id-input</x-slot>
    <x-slot name="label_text">Cerca nel sito</x-slot>
    <x-slot name="placeholder_text">Cerca</x-slot>
  </x-input.search>

</div>
