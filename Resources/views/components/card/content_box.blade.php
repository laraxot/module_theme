<div class="cmp-card {{$cmpClass}} {{margin-class}}">
  <div class="card {{ isset($bg_grey)?'has-bkg-grey shadow-sm':'' }} {{isset($bg_grey_primary)?'has-bkg-primary-grey':''}}  {{ isset($contacts)?'contacts has-bkg-grey':'' }}  {{$class}}" >

  @if(isset($card_title))
    <div class="card-header border-0 p-0 mb-lg-30 {{isset($header_m0)?'m-0':''}} {{$header_class}}">
      <div class="d-flex">
        @if(isset($card_title))
          @if(isset($h3_title))
            <h3 class="subtitle-large {{$h3_class}} {{isset($required_icon)?'icon-required':''}}" @if(isset($id_title)id="{{$id_title}}"@endif>{{$card_title}}</h3>
          @else
            <h2 class="title-xxlarge {{$h2_class}} {{isset($required_icon)?'icon-required':''}}" @if(isset($id_title) id="{{$id_title}}"@endif>{{$card_title}}</h2>
          @endif
        @endif
      </div>
      
      @if(isset($second_title))
        <h3 class="subtitle-medium cmp-card__second-title {{$secondTitle_class}}" >{{$second_title}}</h3>
      @endif
      
      @if(isset($subtitle))
        <p class="subtitle-small mb-0 {{$subtitleClass}} {{@if(isset($lora))?'lora':''}} ">{{$subtitle}}</p>
      @endif

      
      @if(isset($toggle))

        
        

        {{>partials/toggle/toggle label="C’è un coobbligato"}}
      @endif

      
      @if(isset($select))
        {{>partials/select/select id=select-id no-bg=true class=classSelect label-text=labelSelect}}
      @endif


    </div>
    @endif
    <div class="card-body p-0">
      {{> @partial-block}}
    </div>
  </div>
</div>