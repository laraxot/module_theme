<div class="dropdown">
  <button class="btn btn-dropdown dropdown-toggle" type="button" id="dropdownMenu-{{{$id}}}" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" aria-label="{{$aria_label ?? ''}}">
    <svg class="icon-expand icon icon-sm icon-primary"><use href="../assets/bootstrap-italia/dist/svg/sprites.svg#it-expand"></use></svg>
      <span class="dropdown__title">{{$label}}</span>
  </button>
  <div class="dropdown-menu" aria-labelledby="dropdownMenu-{{{$id}}}">
    <div class="link-list-wrapper">
      <ul class="link-list">
        <li><a class="dropdown-item list-item" href="#"><span>Azione 1</span></a></li>
        <li><a class="dropdown-item list-item" href="#"><span>Azione 2</span></a></li>
        <li><a class="dropdown-item list-item" href="#"><span>Azione 3</span></a></li>
      </ul>
    </div>
  </div>
</div>