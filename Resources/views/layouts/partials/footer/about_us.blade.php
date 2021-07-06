<div class="footer_about">
	<h5>@lang('pub_theme::footer.about_us')</h5>
	<ul>
		@if(isset($page))
		@foreach($page->archive()->get() as $item0)
		<li><a href="{{ $item0->url }}">{{ $item0->title }}</a> </li>
		@endforeach
		@endif
	</ul>
	@include('pub_theme::iubenda.cookie_policy')
	@include('pub_theme::iubenda.privacy_policy')
</div>
