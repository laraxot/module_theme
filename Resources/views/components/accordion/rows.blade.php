<div class="cmp-accordion">
  <div class="accordion" id="{{$id}}">
    @foreach($rows as $item)
    <div class="accordion-item">
      <div class="accordion-header" id="heading{{$item->num}}">
        <button class="accordion-button collapsed title-snall-semi-bold @if(isset($item->txt)) py-3 @endif" type="button"
          data-bs-toggle="collapse" data-bs-target="#collapse{{$item->num}}" aria-expanded="true"
          aria-controls="collapse{{$item->num}}">
          <div class="button-wrapper">
            {{$item->title}}
            <div class="icon-wrapper">
              <img class="icon-folder @if(isset($warning_icon))icon-warning @endif" src="../assets/images/{{$item->icon}}"
                alt="folder {{$item->icon_label}}" role="img">
              <span class="{{$item->color}}">{{$item->icon_label}}</span>
            </div>
        </button>
        @if(isset($item->date))
          <p class="accordion-date title-xsmall-regular mb-0">{{$item->date}}</p>
        @endif
      </div>


      <div id="collapse{{$item->num}}" class="accordion-collapse collapse p-0"
        data-bs-parent="#accordionExample{{$item->num}}" role="region" aria-labelledby="heading{{$item->num}}">
        <div class="accordion-body">
          @if(isset($item->txt))
            <p class="mb-3">{{{$item->txt}}}</p>
          @else
            <p class="mb-2 fw-normal">{{$item->practice}} <span class="label">{{$item->practice_number}}</span></p>

            @if(isset($item->import))
              <p class="mb-2 fw-normal">Metodo: <span class="label">PagoPA</span></p>
              <p class="mb-2 fw-normal">Importo: <span class="label">{{$item->import}}</span></p>
            @endif

            <a href="#" class="mb-2">
              <span class="t-primary">Scheda servizio</span>
            </a>

            @if(isset($item->label_tag))
              <x-link type="tag">
                <x-slot name="label_tag">{{$item->label_tag}}</x-slot>
                <x-slot name="label_tag_up">{{$item->label_tag_up}}</x-slot>
              </x-link>
              {{-- {{>partials/cmp-tag/cmp-tag label-tag=item.label-tag }} --}}
            @endif


            {{-- <x-lists type="icon" :icon_lists="collect([])">
                <x-slot name="title">{{false}}</x-slot>
                <x-slot name="class">mt-3 p-0</x-slot>
            </x-lists> --}}

            {{-- {{>cmp-icon-list/cmp-icon-list
            title=false
            class="mt-3 p-0"
            icon-list=item.collapse
            }} --}}

            @if(isset($item->btn_label))
              {{-- {{>partials/button/button label=item.btn-label primary="true" class="justify-content-center
              my-3"}} --}}
                <x-button type="advanced">
                    <x-slot name="label">{{$item->btn_label}}</x-slot>
                    <x-slot name="class">justify-content-center my-3</x-slot>
                    <x-slot name="primary">{{true}}</x-slot>
                <x-button>
            @endif
          @endif
        </div>
      </div>
    </div>
    @endforeach
  </div>
</div>