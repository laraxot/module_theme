<div class="cmp-modal">
    <div class="modal fade it-dialog-scrollable" tabindex="-1" role="dialog" id="{{$id}}" aria-labelledby="{{$id}}-modal-title">
      <div class="modal-dialog modal-dialog-centered {{$class ?? ''}}" role="document">
        <div class="modal-content modal-dimensions {{$sub_class ?? ''}}">
          <div class="cmp-modal__header modal-header pb-0">
            <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Chiudi finestra modale">
            </button>
            <div class="cmp-modal__header mt-30 mt-lg-50">

              @if(isset($date))
                  <date class="date-regular w-100 ">{{$date}}</date>
              @endif
              @if(isset($title))
              <h2 id="{{$id}}-modal-title" class="title-xxxlarge mt-2 mb-0">{{$title}}</h2>
            </div>
            @endif
          </div>
          <div class="modal-body">
            {{-- {{> @partial-block}} --}}
          </div>
        </div>
      </div>
    </div>
  </div>