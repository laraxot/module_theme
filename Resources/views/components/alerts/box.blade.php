@if(isset($error))
<div class="cmp-alert-box">
  <div class="alert-box-icon">
    <svg class="icon">
      <use href="../assets/bootstrap-italia/dist/svg/sprites.svg#it-error"
        xlink:href="../assets/bootstrap-italia/dist/svg/sprites.svg#it-error"></use>
    </svg>
    <span>Errore</span>
  </div>
  <p class="description">{{$message}}</p>
</div>
@endif

@if(isset($warning))
<div class="cmp-warning-box border-start border-warning border-2 {{$class}}">
  <div class="warning-box-icon">
    <svg class="icon icon-warning" aria-hidden="true">
      <use href="../assets/bootstrap-italia/dist/svg/sprites.svg#it-info-circle"
        xlink:href="../assets/bootstrap-italia/dist/svg/sprites.svg#it-warning"></use>
    </svg>
    <span class="t-alert {{$alertSpan_class}}">ATTENZIONE</span>
  </div>
  <div class="d-flex">
    <p class="description description-warning {{$description_class}}">{{$message}}</p>
  </div>


  @if(isset($alert_link_list))
  <ul>
    @foreach($alert_link_list as $list)
    <li>
      <a href="#{{$id}}" class="t-primary subtitle-small pb-1 pt-1">{{$text}}</a>
    </li>
    @endforeach
  </ul>
  @endif
</div>
@endif