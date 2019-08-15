<div class="footer_citta">
	<h5>@lang('pub_theme::footer.home.index.random_locations')</h5>
	<ul>
		@if(isset($location))
		@foreach($location->archiveRand(6) as $item0)
		<li><a href="{{ $item0->url}}" title="{{ $item0->title}}">{{ $item0->title}}</a> </li>
		@endforeach
		@endif
		<li><a href="{{url($lang.'/location')}}">@lang('pub_theme::footer.home.index.other_locations')</a></li>
	</ul>
</div>
