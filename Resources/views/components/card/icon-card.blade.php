<div class="cmp-icon-card mb-3">
  <div class="card {{card-class}} {{#if shadow-card}}drop-shadow{{/if}} {{#if notice-card}}notice-border px-3 py-1{{/if}}">
    <div class="cmp-card-title d-flex">
      <svg class="icon icon-sm me-2 {{icon-color}}" aria-hidden="true">
        <use href="../assets/bootstrap-italia/dist/svg/sprites.svg#{{icon}}"></use>
      </svg>
      {{#if card-title}}
        {{#if no-h-title}}
        <div class="{{title-class}}">
          <a href="#">{{card-title}}</a>
        </div>
        {{else}}
        <h3 class="{{title-class}}">
           <a href="#">{{card-title}}</a>
        </h3>
        {{/if}}
      {{/if}}
    </div>
    <div class="cmp-icon-card__description">
      {{#if description}}
      <p class="subtitle-small">{{{description}}}</p>
      {{/if}}
      {{#if date}}
      <date class="date-xsmall ml-30">{{date}}</date>
      {{/if}}
    </div>
  </div>
</div>