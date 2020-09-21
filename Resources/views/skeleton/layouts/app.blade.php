@extends('pub_theme::layouts.plane')
@section('body')
	<div class="site-wrapper">
		@include('pub_theme::layouts.partials.headernav')
		@yield('content')
	</div>
	@if(isset($footer) && $footer=='off')
	@else
	@include('pub_theme::layouts.partials.footer') 
	@endif
@endsection
