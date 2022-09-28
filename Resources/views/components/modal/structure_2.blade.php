<div class="cmp-modal">
    <div class="modal fade" tabindex="-1" role="dialog" id="{{id}}" aria-labelledby="{{id}}-modal-title">
      <div class="modal-dialog modal-dialog-centered {{class}}" role="document">
        <div class="modal-content modal-dimensions">
          <div class="cmp-modal__header modal-header pb-0">
            <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Chiudi finestra modale">
            </button>
            @if($date)
              <date class="date-xsmall w-100">{{$date}}</date>
            @endif
            <h2 class="cmp-modal__header-title title-mini" id="{{$id}}-modal-title">{{$modalTitle}}</h2>
           @if($subtitle)
              <h3 class="subtitle-small_semi-bold w-100">{{$subtitle}}</h3>
           @endif
            <p class="cmp-modal__header-info header-font">{{$modalInfo}}</p>
           @if($link)
            <a href="#" class="cmp-modal__header-link text-success underline {{$link_class}}">{{$link}}</a>
            @endif
          </div>
          <div class="modal-body">
            {{> @partial-block}}
          </div>
         @if($buttons)
          <div class="modal-footer pb-70 @if($no_body) pt-0 @endif ">
            <button class="btn btn-primary  w-100 mx-0 fw-bold mb-4" type="submit" data-bs-toggle="modal" data-bs-target="#{{$modalId}}" form="{{$id_form}}">{{$labelBtnSave}}</button>
            <button class="btn btn-outline-primary w-100 mx-0" data-bs-dismiss="modal fw-bold"
              type="button">{{$labelBtnCancel}}</button>
          </div>
         @endif
        </div>
      </div>
    </div>
  </div>