<div class="cmp-info-summary bg-white {{$class}}">
    <div class="card">
  
   @if(isset($title))
      <div class="card-header border-bottom border-light p-0 mb-0 {{$header_class}}{{#if info-title}}d-flex justify-content-between{{/if}} {{#if info-list}} @if(isset($info_list)) d-flex justify-content-end @endif">
        <h3 class="title-large-semi-bold mb-3">{{$title}}</h3>
      </div>
    @endif
  
      <div class="card-body p-0">
        {{#if info}}
        {{#each info-list as |info|}}
        <div class="single-line-info border-light {{#if info.border-unset}}border-unset{{/if}}">
          {{#if info.name}}
          <div class="text-paragraph-small">{{info.name}}</div>
          {{/if}}
          {{#if info.warning}}
          <p class="fw-semibold data-text description-alert d-flex align-items-center border-light">
            <span class="d-flex align-items-center">
              <svg class="icon icon-sm icon-warning" aria-hidden="true">
                <use href="../assets/bootstrap-italia/dist/svg/sprites.svg#it-error"></use>
              </svg>
              {{info.warning-message}}
            </span>
          </p>
          {{else}}
          <div class="border-light {{#if summary-item-class}} border-0 {{/if}} {{#if info.summary}}summary-inline{{/if}}">
            {{#if info.description}}
            <p class="data-text {{#if info.summary}}summary-inline{{/if}}">
              {{info.description}}
              {{#if info.summary}}
              <strong>{{info.summary}}</strong>
              {{/if}}
            </p>
            {{/if}}
  
            {{#if description-image}}
            <div class="d-lg-flex gap-2 mt-3">
              <div>
                <img src="../assets/images/image-disservizio.png" alt="Mappa" class="img-fluid w-100 mb-3 mb-lg-0">
              </div>
              <div>
                <img src="../assets/images/image-disservizio.png" alt="Mappa" class="img-fluid w-100 mb-3 mb-lg-0">
              </div>
              <div>
                <img src="../assets/images/image-disservizio.png" alt="Mappa" class="img-fluid w-100">
              </div>
            </div>
            {{/if}}
  
  
            {{#if info.success}}
            <p class="fw-semibold pb-2 pt-2 data-text description-success d-flex align-items-center">
              <span class="d-flex align-items-center">
                <svg class="icon icon-sm icon-success" aria-hidden="true">
                  <use href="../assets/bootstrap-italia/dist/svg/sprites.svg#it-check-circle"></use>
                </svg>
                {{info.success-message}}
              </span>
            </p>
            {{/if}}
          </div>
          {{/if}}
        </div>
        {{/each}}
        {{/if}}
      </div>
      <div class="card-footer p-0 {{#if disservizio-page}} d-none {{/if}} ">
        {{#if btn}}
        {{>partials/button/button label=btn-label-text aria-label=btn-label-text iconBtn="it-pencil" outline-primary=true
        class="w-100 mt-3"
        sm=true}}
        {{/if}}
      </div>
    </div>
  </div>