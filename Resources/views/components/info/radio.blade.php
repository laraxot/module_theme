<div class="cmp-info-radio radio-card">
    <div class="card p-3 p-lg-4">
      <div class="card-header mb-0 p-0">
        <div class="form-check m-0">
          <input class="radio-input" name="{{group}}" type="radio" id="{{idRadio}}">
          <label for="{{idRadio}}"> <h3 class="big-title">{{title}}</h3></label>
        </div>
      </div>
    <div class="card-body p-0">
      {{#each info-appointment as |item|}}
      <div class="info-wrapper">
        <span class="info-wrapper__label">{{item.label}}</span>
        <p class="info-wrapper__value">{{item.value}}</p>
      </div>
      {{/each}}
    </div>
  </div>
</div>

