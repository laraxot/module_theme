<head>
	{!! Theme::metatags() !!}
	@php
    Theme::add('/theme/pub/css/xot.css');
    @endphp
	{!! Theme::showStyles(false) !!}
    @stack('styles')
</head>