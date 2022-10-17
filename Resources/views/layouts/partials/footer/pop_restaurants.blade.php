<div class="footer_cucine">
	<h5>@lang('pub_theme::footer.home.index.random_restaurant')</h5>
	<ul>
<<<<<<< HEAD

=======
		
>>>>>>> ede0df7 (first)
		@if(isset($restaurant))
		@foreach($restaurant->archive()->inRandomOrder()->limit(6)->get() as $item0)
		<li><a href="{{ $item0->url}}" title="{{ $item0->title}}">{{ $item0->title}}</a> </li>
		@endforeach
		@endif
<<<<<<< HEAD

=======
		
>>>>>>> ede0df7 (first)
		<li><a href="{{url($lang.'/restaurant')}}">@lang('pub_theme::footer.home.index.other_restaurants')</a></li>
	</ul>
</div>
