<div class="cmp-info-button-card @if(isset($radio)) 'radio-card' @else '' @endif {{$card_class ?? ''}}">
  <div class="card @if(isset($shadow)) shadow @endif p-3 p-lg-4">
    @if(isset($radio))
        <div class="card-header mb-0 p-0">
        <div class="form-check m-0">
            <input class="radio-input" name="{{$group}}" type="radio" id="{{$idRadio}}">
            <label for="{{$idRadio}}">
            <h3 class="big-title mb-0">{{$radio_title}}</h3>
            </label>
        </div>
        </div>
    @endif
    <div class="card-body p-0">
      @if(isset($big_title))
        <h3 class="big-title mb-0">{{{$big_title}}}</h3>
      @endif

        @if(isset($medium_title))
      <h3 class="medium-title mb-0">{{$medium_title}}</h3>
      @endif


      @if(isset($name))
      <p class="name">{{$name}}</p>
      @endif

      @if(isset($label_1))
      <p class="card-info">{{$label_1}}</p>
      @endif

      @if(isset($label_2))
      <p class="card-info">{{$label_2}}</p>
      @endif

      @if(isset($error))
        <x-alerts.box>
            <x-slot name="message">{{$alertMessage}}</x-slot>
        </x-alerts.box>
        {{-- {{> cmp-alert-box/cmp-alert-box message=alertMessage}} --}}
        <button type="button" class="btn btn-outline-primary mt-3 w-100" data-bs-toggle="modal"
            data-bs-target="#{{$modalId}}">{{$btnLabel}}</button>
      @endif

      
      @if(isset($show_more_anagrafica))
      <x-accordion.rows type="anagrafica" :rows="collect([])"></x-accordion.rows>
      @endif

      @if(isset($show_more_anagrafica_2))
      <x-accordion.rows type="anagrafica" :rows="collect([])">
      <x-slot name="acc_open">acc-open</x-slot>
      </x-accordion.rows>
      @endif
    
      @if(isset($show_more_anagrafica_3))
      <x-accordion.rows type="anagrafica" :rows="collect([])"></x-accordion.rows>
      @endif

      @if(isset($show_more_anagrafica_4))
      <x-accordion.rows type="anagrafica" :rows="collect([])"></x-accordion.rows>
      @endif

      @if(isset($show_more_vehicle))
      <x-accordion.rows type="anagrafica" :rows="collect([])"></x-accordion.rows>
      @endif

      @if(isset($show_more_isee))
      <x-accordion.rows type="anagrafica" :rows="collect([])">
      <x-slot name="acc_open">acc-open</x-slot>
      </x-accordion.rows>
      @endif

      @if(isset($show_more_disservizio))
      <x-accordion.rows type="anagrafica" :rows="collect([])">
      <x-slot name="no_header">true</x-slot>
      </x-accordion.rows>
      @endif

      @if(isset($show_accordion_bank))
      <x-accordion.rows type="anagrafica" :rows="collect([])">
      </x-accordion.rows>
      @endif
    
    </div>
  </div>
</div>