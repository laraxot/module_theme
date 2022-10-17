@extends('pub_theme::layouts.plane')
@section('body')
	<div class="site-wrapper">
		@include('pub_theme::layouts.partials.headernav')
		@yield('content')
	</div>
	@if(isset($footer) && $footer=='off')
	@else
<<<<<<< HEAD
	@include('pub_theme::layouts.partials.footer')
=======
	@include('pub_theme::layouts.partials.footer') 
>>>>>>> ede0df7 (first)
	@endif
@endsection
