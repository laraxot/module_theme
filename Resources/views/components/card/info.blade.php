<div class="info-card {{margin}}">
  <div class="name">
    {{#if radio}}
      {{> radio/radio label=user}}
    {{else}}
      {{user}}
    {{/if}}
  </div>
  {{#each infoItem as |item| }}
  <div class="info-item">
    {{item.name}} <strong>{{item.value}}</strong>
  </div>
  {{/each}}
  {{#if alertText}}
    <div class="alert-box">
      <div class="icon">
        <svg width="25" height="24" viewBox="0 0 25 24" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path fill-rule="evenodd" clip-rule="evenodd" d="M12.1667 17C10.6933 17 9.5 18.1933 9.5 19.6667C9.5 21.14 10.6933 22.3333 12.1667 22.3333C13.64 22.3333 14.8333 21.14 14.8333 19.6667C14.8333 18.1933 13.64 17 12.1667 17ZM10.8333 13C10.8333 13.736 11.4307 14.3333 12.1667 14.3333C12.9027 14.3333 13.5 13.736 13.5 13L14.7373 4.33867C14.7933 4.12267 14.8333 3.9 14.8333 3.66667C14.8333 2.19333 13.64 1 12.1667 1C10.6933 1 9.5 2.19333 9.5 3.66667C9.5 3.9 9.54 4.12267 9.596 4.33867L10.8333 13Z" fill="#BACCD9"/>
        </svg>
      </div>
      <div class="text">{{alertText}}</div>
    </div>
    {{> partials/button/button label=alertBtn outline-primary=true class="mobile-full mt-15"}}
  {{/if}}
</div>
{{--  https://github.com/italia/design-comuni-pagine-statiche/blob/main/src/components/info-card/info-card.hbs --}}