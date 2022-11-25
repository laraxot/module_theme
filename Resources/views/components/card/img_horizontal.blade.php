@props([
  'img_src'=>null,
  'title'=>null,
  'txt'=>null,
])
{{--
https://getbootstrap.com/docs/4.5/components/card/#horizontal
--}}
<div class="card mb-3" style="max-width: 540px;">
  <div class="row no-gutters">
    <div class="col-md-4">
      <img src="{{ $img_src }}" class="card-img" alt="...">
    </div>
    <div class="col-md-8">
      <div class="card-body">
        <h5 class="card-title">{{ $title}}</h5>
        <p class="card-text">{{ $txt }}</p>
      </div>
    </div>
  </div>
</div>