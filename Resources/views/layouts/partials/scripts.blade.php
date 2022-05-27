{{-- Bootstrap core JavaScript
	<script src="/themes/foodpicky/js/jquery.min.js"></script>
	<script src="/themes/foodpicky/js/tether.min.js"></script>
	<script src="/themes/foodpicky/js/bootstrap.min.js"></script>
	<script src="/themes/foodpicky/js/animsition.min.js"></script>
	<script src="/themes/foodpicky/js/bootstrap-slider.min.js"></script>
	<script src="/themes/foodpicky/js/jquery.isotope.min.js"></script>
	<script src="/themes/foodpicky/js/headroom.js"></script>
	<script src="/themes/foodpicky/js/foodpicky.min.js"></script>
	================================================== --}}
<script>
    var base_url = '{{ asset('/') }}';
    var lang = '{{ app()->getLocale() }}';
    {{-- var google_maps_api='{{ config('xra.google.maps.api') }}'; --}}
    @if (\Request::has('address'))
        var address ="{{ \Request::input('address') }}";
    @endif
    @if (\Request::has('lat') && \Request::has('lng'))
        var lat ="{{ \Request::input('lat') }}";
        var lng ="{{ \Request::input('lng') }}";
    @endif
</script>
@stack('scripts_before')
@php
//Theme::add('pub_theme::js/jquery.min.js',1);

//Theme::add('pub_theme::js/tether.min.js');
Theme::add('pub_theme::js/bootstrap.min.js');
Theme::add('pub_theme::js/foodpicky.js');
/*
 Theme::add('pub_theme::js/bootstrap-slider.min.js');
 Theme::add('pub_theme::js/jquery.isotope.min.js');
 Theme::add('pub_theme::js/headroom.js');
 Theme::add('/theme/bc/matchHeight/dist/jquery.matchHeight-min.js');
 //Theme::add('pub_theme::js/jquery.validate.min.js');
 */
Theme::add('pub_theme::js/xot.js');
@endphp
{!! Theme::showScripts(false) !!}
@stack('scripts')

{{-- dd(Theme::__getStatic('langs')) --}}
