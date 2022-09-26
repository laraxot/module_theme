<div class="cmp-heading @if($heading_p0) p-0@elsepb-3 pb-lg-4 @endif">
    @if($iconTitle)
        <div class="categoryicon-top d-flex">
            <svg class="icon icon-success {{$iconClass}}" aria-hidden="true">
                <use href="../assets/bootstrap-italia/dist/svg/sprites.svg#{{$iconTitle}}"></use>
            </svg>
            @if(isset($h2))
                <h2 class="title-xxxlarge mb-0 ml-10 {{--title-class--}}">{{$title}}</h2>
            @else
                <h1 class="title-xxxlarge {{--title-class--}}">{{$title}}</h1>
            @endif
        </div>
    @else
        @if(isset($h2))
            <h2 class="title-xxxlarge {{--title-class--}}">{{$title}}</h2>
        @else
            <h1 class="title-xxxlarge {{--title-class--}}">{{$title}}</h1>
        @endif
    @endif

  @php
  /*

    {{#if label-tag-up}}
  <div class="d-flex flex-wrap cmp-heading__tag">
    {{>partials/cmp-tag/cmp-tag}}
  </div>
  @endif

  {{#if subTitle}}
  <p class="subtitle-small {{pClass}}">{{{subTitle}}}</p>
  @endif

  {{#if label-tag}}
  <div class="d-flex flex-wrap gap-2 cmp-heading__tag">
    {{>partials/cmp-tag/cmp-tag}}
  </div>
  @endif

  {{#if descriptionAfterTag}}
  <p class="text-paragraph">
    {{descriptionAfterTag}}
  </p>
  @endif

  {{#if description}}
  <p class="subtitle-small {{desClass}}">{{{description}}}</p>
  @endif

  {{#if button}}
    {{>partials/button/button class="fw-bold"}}
  @endif

  {{#if double-button}}
  <div class="d-lg-flex gap-30 mb-2">
      {{>partials/button/button class="fw-bold btn-primary mr-lg-30"}}
      {{>partials/button/button class="fw-bold btn-outline-primary t-primary" label=second-label aria-label=second-ariaLabel}}
  </div>
  @endif

  */
  @endphp
</div>