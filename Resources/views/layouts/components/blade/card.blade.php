<div class="card" style="width: 18rem;">
{{--  
  <img class="card-img-top" src="..." alt="Card image cap">
  --}}
  <div class="card-header">
  	{!! isset($header)?$header:'' !!}
  </div>
  <div class="card-body">
    <h5 class="card-title">{!! $title !!}</h5>
    <p class="card-text">{{ isset($text)?$text:'' }}</p>
    <a href="{{ $url }}" class="btn btn-primary card-link">
    	&nbsp;<i class="fa fa-arrow-circle-right"></i>
    </a>
  </div>
</div>