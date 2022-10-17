<div class="cmp-icon-list">
  {{#if title}}
  <h2 class="title-xxlarge mt-40 mb-2 mb-lg-4 {{titleClass}}" {{#if id-title}}id="{{id-title}}"{{/if}}>{{{title}}}</h2>
  {{/if}}
<div class="link-list-wrapper {{#if default}}default{{/if}}">
  <ul class="link-list {{classMenu}}">
    {{#each icon-list as |item|}}
    <li class="{{class}}">
      <a class="list-item icon-left t-primary title-small-semi-bold" href="#" {{#if aria-label}}aria-label="{{item.aria-label}} {{item.link}}"{{/if}} {{#if only-ariaLabel}}aria-label="{{item.only-ariaLabel}}"{{/if}}>
        <span class="list-item-title-icon-wrapper">
          <svg class="icon icon-sm align-self-start {{item.icon-class}} icon-color" aria-hidden="true"><use href="../assets/bootstrap-italia/dist/svg/sprites.svg#{{item.icon}}"></use></svg>
          <span class="list-item-title title-small-semi-bold {{item.classLink}}">{{item.link}}</span>
        </span>
        {{#if item.description}}
      <p class="ml-40 text-paragraph-regular-medium text-black">{{item.description}}</p>
      {{/if}}
      </a>

    </li>
    {{/each}}
  </ul>
</div>
</div>
