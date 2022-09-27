<div class="cmp-heading {{#if heading-p0}}p-0{{else}}pb-3 pb-lg-4{{/if}}">
  <div class="row">
    <div class="col-lg-8">
      {{#if h2}}
        <h2 class="title-xxxlarge {{title-class}}">{{title}}</h2>
      {{else}}
        <h1 class="title-xxxlarge {{title-class}}" data-element="service-title">{{title}}</h1>
      {{/if}}

      {{#if label-tag-up}}
        <div class="d-flex flex-wrap cmp-heading__tag">
          <div class="cmp-tag">
            <span class="cmp-tag__tag title-xsmall" data-element="service-status">Servizio attivo</span>
          </div>
        </div>
      {{/if}}

      {{#if subTitle}}
        <p class="subtitle-small {{pClass}}">{{{subTitle}}}</p>
      {{/if}}

      {{#if description}}
        <p class="subtitle-small {{desClass}}" data-element="service-description">{{{description}}}</p>
      {{/if}}

      {{#if button}}
        {{>partials/button/button class="fw-bold"}}
      {{/if}}

      {{#if double-button}}
        <div class="d-lg-flex gap-30 mb-2">
            {{>partials/button/button class="fw-bold btn-primary mr-lg-30"}}
            {{>partials/button/button class="fw-bold btn-outline-primary t-primary" label=second-label aria-label=second-ariaLabel}}
        </div>
      {{/if}}
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