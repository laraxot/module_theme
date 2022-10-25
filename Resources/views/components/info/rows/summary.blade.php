@props(['header_class' => '', 'info' => false])
<div class="cmp-info-summary bg-white {{$attributes->class([])}}">
    <div class="card">

      <div
        class="card-header border-bottom border-light p-0 mb-0 {{$header_class}}
            @if(isset($title)) d-flex justify-content-between @endif
            @if(isset($rows))d-flex justify-content-end @endif">
        @if(isset($title))
        <h4 class="title-large-semi-bold mb-3">{{$title}}</h4>
        @endif
        @if(isset($rows))
        <a href="#" class="@if(isset($no_header)) d-none @endif text-decoration-none"><span
            class="text-button-sm-semi t-primary">Modifica</span></a>
        @endif
      </div>

      <div class="card-body p-0">
        @if(isset($info))
          @foreach($rows as $info)
            <div class="single-line-info border-light @if(isset($info->border_unset)) border-unset @endif" @if(isset($info->warning)) id="{{$info->warningId}}"@endif>
              @if(isset($info->name))
                <div class="text-paragraph-small">{{$info->name}}</div>
              @endif
              @if(isset($info->warning))
                @if(isset($info->txt))
                  <p class="data-text
                  @if(isset($info->summary)) summary-inline @endif">
                  {{$info->txt}}</p>
                @endif
                <p class="fw-semibold data-text description-alert d-flex align-items-center border-light">
                  <span class="d-flex align-items-center">
                    <svg class="icon icon-sm icon-warning" aria-hidden="true">
                      <use href="../assets/bootstrap-italia/dist/svg/sprites.svg#it-error"></use>
                    </svg>
                    {{$info->warning_message}}
                  </span>
                </p>
              @else
                <div class="border-light @if(isset($summary_item_class)) border-0 @endif @if(isset($info->summary)) summary-inline @endif">
                  @if(isset($info->txt))
                    <p class="data-text @if(isset($info->summary)) summary-inline @endif">
                      {{$info->txt}}
                      @if(isset($info->summary))
                        <strong>{{$info->summary}}</strong>
                      @endif
                    </p>
                  @endif

                  @if(isset($description_image))
                    <div class="d-lg-flex gap-2 mt-3">
                      <div>
                        <img src="../assets/images/image-disservizio.png" alt="Immagine della mappa di dove si trova il disservizio" class="img-fluid w-100 mb-3 mb-lg-0">
                      </div>
                      <div>
                        <img src="../assets/images/image-disservizio.png" alt="Immagine della mappa di dove si trova il disservizio" class="img-fluid w-100 mb-3 mb-lg-0">
                      </div>
                      <div>
                        <img src="../assets/images/image-disservizio.png" alt="Immagine della mappa di dove si trova il disservizio" class="img-fluid w-100">
                      </div>
                    </div>
                  @endif


                  @if(isset($info->success))
                    <p class="fw-semibold pb-2 pt-2 data-text description-success d-flex align-items-center">
                      <span class="d-flex align-items-center">
                        <svg class="icon icon-sm icon-success" aria-hidden="true">
                          <use href="../assets/bootstrap-italia/dist/svg/sprites.svg#it-check-circle"></use>
                        </svg>
                        {{$info->success_message}}
                      </span>
                    </p>
                  @endif
                </div>
              @endif
            </div>
          @endforeach
        @endif
      </div>
      <div class="card-footer p-0 @if(isset($disservizio_page)) d-none @endif ">
        @if(isset($btn))
          {{-- {{>partials/button/button label=btn-label-text iconBtn="it-pencil" outline-primary=true class="w-100 mt-3"
        sm=true}} --}}
        @endif
      </div>
    </div>
  </div>