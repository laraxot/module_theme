@php
	$showRegistration = true;
	if(
		//(Auth::check() &&
		//count(\XRA\Food\Models\Restaurant::where("email",Auth::User()->email)->get()) > 0) ||
		(Request::is($lang.'/restaurant/create')) ||
		(Request::is($lang.'/restaurant_owner/create'))
	) {
	$showRegistration = false;
	}
@endphp

@if($showRegistration)
	<li class="nav-item">
		<a href="{{ url($lang.'/restaurant/create') }}"	class="btn btn-red btn-round" style="border-radius: 0px 25px 0px 25px; box-shadow: -2px 2px 2px 2px #0000008a;">
			@lang('pub_theme::headernav.add_your_restaurant')
		</a>
	</li>
@endif
