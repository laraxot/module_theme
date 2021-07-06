<div class="footer_cucine">
	<h5>Random Cuisine</h5>
	<ul>
		@if(isset($cuisineCat))
		@foreach($cuisineCat->archive()->inRandomOrder()->limit(6)->get() as $item0)
		<li><a href="{{ $item0->url}}" title="{{ $item0->title}}">{{ $item0->title}}</a> </li>
		@endforeach
		@endif
		<li><a href="{{url($lang.'/cuisineCat')}}">Other cuisines..</a></li>
	</ul>
</div>
