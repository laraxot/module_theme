<div class="cmp-info-button-card {{isset($radio)?'radio-card':''}} {{$card_class}}">
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
      @if(isset($bit_title))
        <h3 class="big-title mb-0">{{{$bit_title}}}</h3>
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
      
      {{>partials/cmp-accordion/cmp-accordion-anagrafica }}
      @endif

      {{#if show-more-anagrafica-2}}
      {{>partials/cmp-accordion/cmp-accordion-anagrafica-2 acc-open=acc-open}}
      {{/if}}

      {{#if show-more-anagrafica-3}}
      {{>partials/cmp-accordion/cmp-accordion-anagrafica-3 }}
      {{/if}}

      {{#if show-more-anagrafica-4}}
      {{>partials/cmp-accordion/cmp-accordion-anagrafica-4 }}
      {{/if}}

      {{#if show-more-vehicle}}
      {{>partials/cmp-accordion/cmp-accordion-vehicle }}
      {{/if}}

      {{#if show-more-isee}}
      {{>partials/cmp-accordion/cmp-accordion-isee acc-open=acc-open }}
      {{/if}}

      {{#if show-more-disservizio}}
      {{>partials/cmp-accordion/cmp-accordion-disservizio no-header=true }}
      {{/if}}

      {{#if show-accordion-bank}}
      {{>partials/cmp-accordion/cmp-accordion-bank }}
      {{/if}}
    </div>
  </div>
</div>