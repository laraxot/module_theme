{{--
    https://getbootstrap.com/docs/4.5/components/card/
--}}
<div class="card" style="width: 18rem;">
  <img src="{{ $img_src }}" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">{{ $title}}</h5>
    <p class="card-text">{{ $content }}</p>

   {!! $btns ?? '' !!}
  </div>
</div>