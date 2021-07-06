<!DOCTYPE html>
<html lang="{{ $lang }}">
@section('htmlheader')
	@include('pub_theme::layouts.partials.htmlheader')
@show
<body class="home">
@yield('body')
@section('scripts')
	@include('pub_theme::layouts.partials.scripts')
@show
</body>
</html>