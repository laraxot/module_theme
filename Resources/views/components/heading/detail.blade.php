<div class="cmp-heading @if(isset($heading_p0)) p-0 @else pb-3 pb-lg-4 @endif ">
  <div class="row">
    <div class="col-lg-8">
      @if(isset($h2))
        <h2 class="title-xxxlarge {{$title_class ?? ''}}">{{$title}}</h2>
       @else
        <h1 class="title-xxxlarge {{$title_class ?? ''}}" data-element="service-title">{{$title}}</h1>
       @endif

      @if(isset($label_tag_up))
        <div class="d-flex flex-wrap cmp-heading__tag">
          <div class="cmp-tag">
            <span class="cmp-tag__tag title-xsmall" data-element="service-status">Servizio attivo</span>
          </div>
        </div>
       @endif

      @if(isset($subTitle))
        <p class="subtitle-small {{$pClass}}">{{$subTitle}}</p>
       @endif

      @if(isset($description))
        <p class="subtitle-small {{$desClass}}" data-element="service-description">{{$description}}</p>
       @endif

      @if(isset($button))
      {{-- <x-button>
        <x-slot name="class">fw-bold</x-slot>
      </x-button> --}}
      <x-button type="advanced" class="fw-bold">
          <x-slot name="label">Segnalazione disservizio</x-slot>
      </x-button>
      @endif

      @if(isset($double_button))
        <div class="d-lg-flex gap-30 mb-2">
            <x-button>
              <x-slot name="class">fw-bold btn-primary mr-lg-30"</x-slot>
              <x-slot name="label">{{$label}}</x-slot>
            </x-button>
            <x-button>
              <x-slot name="class">fw-bold btn-outline-primary t-primary</x-slot>
              <x-slot name="label">{{$second_label}}</x-slot>
              <x-slot name="aria_label">{{$second_aria_label ?? ''}}</x-slot>
            </x-button>
        </div>
       @endif
    </div>
    <div class="col-lg-3 offset-lg-1 mt-5 mt-lg-0">
      <div class="dropdown">
        <button aria-label="condividi sui social" class="btn btn-dropdown dropdown-toggle text-decoration-underline d-inline-flex align-items-center fs-0" type="button"
          id="shareActions" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <svg class="icon" aria-hidden="true">
            <use xlink:href="../assets/bootstrap-italia/dist/svg/sprites.svg#it-share"></use>
          </svg>
          <small>Condividi</small>
        </button>
        <div class="dropdown-menu shadow-lg" aria-labelledby="shareActions">
          <div class="link-list-wrapper">
            <ul class="link-list" role="menu">
              <li role="none">
                <a class="list-item" href="#" role="menuitem">
                  <svg class="icon" aria-hidden="true">
                    <use xlink:href="../assets/bootstrap-italia/dist/svg/sprites.svg#it-facebook"></use>
                  </svg>
                  <span>Facebook</span>
                </a>
              </li>
              <li role="none">
                <a class="list-item" href="#" role="menuitem">
                  <svg class="icon" aria-hidden="true">
                    <use xlink:href="../assets/bootstrap-italia/dist/svg/sprites.svg#it-twitter"></use>
                  </svg>
                  <span>Twitter</span>
                </a>
              </li>
              <li role="none">
                <a class="list-item" href="#" role="menuitem">
                  <svg class="icon" aria-hidden="true">
                    <use xlink:href="../assets/bootstrap-italia/dist/svg/sprites.svg#it-linkedin"></use>
                  </svg>
                  <span>Linkedin</span>
                </a>
              </li>
              <li role="none">
                <a class="list-item" href="#" role="menuitem">
                  <svg class="icon" aria-hidden="true">
                    <use xlink:href="../assets/bootstrap-italia/dist/svg/sprites.svg#it-whatsapp"></use>
                  </svg>
                  <span>Whatsapp</span>
                </a>
              </li>
            </ul>
          </div>
        </div>
      </div>
      <div class="dropdown">
        <button aria-label="vedi azioni da compiere sulla pagina" class="btn btn-dropdown dropdown-toggle text-decoration-underline d-inline-flex align-items-center fs-0" type="button"
          id="viewActions" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <svg class="icon" aria-hidden="true">
            <use xlink:href="../assets/bootstrap-italia/dist/svg/sprites.svg#it-more-items"></use>
          </svg>
          <small>Vedi azioni</small>
        </button>
        <div class="dropdown-menu shadow-lg" aria-labelledby="viewActions">
          <div class="link-list-wrapper">
            <ul class="link-list" role="menu">
              <li role="none">
                <a class="list-item" href="#" role="menuitem">
                  <svg class="icon" aria-hidden="true">
                    <use xlink:href="../assets/bootstrap-italia/dist/svg/sprites.svg#it-download"></use>
                  </svg>
                  <span>Scarica</span>
                </a>
              </li>
              <li role="none">
                <a class="list-item" href="#" role="menuitem">
                  <svg class="icon" aria-hidden="true">
                    <use xlink:href="../assets/bootstrap-italia/dist/svg/sprites.svg#it-print"></use>
                  </svg>
                  <span>Stampa</span>
                </a>
              </li>
              <li role="none">
                <a class="list-item" href="#" role="menuitem">
                  <svg class="icon" aria-hidden="true">
                    <use xlink:href="../assets/bootstrap-italia/dist/svg/sprites.svg#it-hearing"></use>
                  </svg>
                  <span>Ascolta</span>
                </a>
              </li>
              <li role="none">
                <a class="list-item" href="#" role="menuitem">
                  <svg class="icon" aria-hidden="true">
                    <use xlink:href="../assets/bootstrap-italia/dist/svg/sprites.svg#it-mail"></use>
                  </svg>
                  <span>Invia</span>
                </a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>