@php
	/*
	Theme::add('adm_theme::dist/css/app.css',1);
	Theme::add('adm_theme::dist/js/manifest.js',1);
	Theme::add('adm_theme::dist/js/vendor.js',2);
	Theme::add('adm_theme::dist/js/app.js',3);	
	*/
@endphp
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script>
$(".datetime_flatpickr").flatpickr({
	wrap: true,
	locale: 'it',
	//altInput: true,
    //altFormat: "F j, Y",
	dateFormat: "d/m/Y H:i",
	enableTime: true,
	time_24hr: true,

});

$(".date_flatpickr").flatpickr({
	wrap: true,
	locale: 'it',
	//altInput: true,
    //altFormat: "F j, Y",
	dateFormat: "d/m/Y",
	//enableTime: true,
	time_24hr: true,
});

$(".time_flatpickr").flatpickr({
	wrap: true,
	locale: 'it',
	//altInput: true,
    //altFormat: "F j, Y",
	dateFormat: "H:i",
	noCalendar: true,
	enableTime: true,
	time_24hr: true,
});
	</script>
{!! Theme::showStyles(false) !!}
@stack('styles')
@yield('content')
{!! Theme::showScripts(false) !!}
@stack('scripts')

