<script>
    var base_url='{{ asset('/') }}';
    var lang='{{ \App::getLocale() }}';
    {{--  var google_maps_api='{{ config('xra.google.maps.api') }}'; --}}
@if(\Request::has('address'))
    var address ="{{ \Request::input('address') }}";
@endif
@if(\Request::has('lat') && \Request::has('lng'))
    var lat ="{{ \Request::input('lat') }}";
    var lng ="{{ \Request::input('lng') }}";
@endif
</script>
@stack('scripts_before')
@php
	Theme::add('/theme/bc/jquery/dist/jquery.min.js',1);
	Theme::add('/theme/pub/js/bootstrap.min.js');
	Theme::add('/theme/pub/js/xot.js');
@endphp
{!! Theme::showScripts(false) !!}
@stack('scripts')
