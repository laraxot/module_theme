<div class="cmp-toggle {{$class}}">
  <div class="toggles">
    <label class="label mb-0" for="toggle-{{$id}}">
            {{$label}}
      <input type="checkbox" id="toggle-{{$id}}">
      <span class="lever me-0 {{if(isset($toggleWhite)?'bg-white':'')}}"></span>
    </label>
  </div>
</div>

@if(isset($openToggle))
    <div class="infoWrapper d-none">

      <x-select :no_bg="true" :select_option_list="">
        <x-slot name="class">mt-4 mb-3 mb-lg-30 mt-lg-40</x-slot>
        <x-slot name="placeholder">Seleziona opzione</x-slot>
      </x-select>

      {{-- {{>partials/select/select no-bg=true class="mt-4 mb-3 mb-lg-30 mt-lg-40"  placeholder="Seleziona opzione" select-option-list=pagamenti-dovuti.controllare-dati-personali.select}} --}}

      <x-card type="info_button">
      </x-card>

      {{> cmp-info-button-card/cmp-info-button-card radio=true group="beneficiaries" idRadio="third"
          radio-title="Giovanni Rossi"
          label-2="Codice Fiscale <br> <span>GVNRSS72H25H501Y</span>"
          show-more-anagrafica-4="true"
          collapse-id="collapse-benef-3"
          modalId="modal-documents"
      }}
    </div>
@endif