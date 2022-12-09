@props([
  'id' => '',
  'wrapper',
  'label' => '',
  'placeholder' => '',
  'btnSearch' => true
])
<div class="cmp-input-search">
  {{-- <div class="form-group autocomplete-wrapper {{$wrapper_class ?? ''}}"> --}}
  <div {{$wrapper->attributes->class(['form-group autocomplete-wrapper'])}}>
    <div class="input-group">
      <label for="autocomplete-{{$id}}"
        class="{{isset($label_visible)?'label-visible':'visually-hidden'}}">{{$label}}</label>
      <input type="search" class="autocomplete form-control" placeholder="{{$placeholder}}" id="autocomplete-{{$id}}"
        name="{{$id}}" data-bs-autocomplete="[]">


      @if(isset($btnSearch))
        <div class="input-group-append">
          <button class="btn btn-primary" type="button" id="button-3">Invio</button>
        </div>
      @endif

      <span class="autocomplete-icon" aria-hidden="true">
        <svg class="icon icon-sm {{$icon_class ?? ''}}">
          <use href="../assets/bootstrap-italia/dist/svg/sprites.svg#it-search"></use>
        </svg>
      </span>
    </div>

    @if(isset($search_subtitle))
      <p id="autocomplete-label" class="{{$text_subtitle_class}}">{{{$text_subtitle}}}</p>
      @endif
  </div>
</div>