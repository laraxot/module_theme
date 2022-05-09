@extends('pub_theme::layouts.plane')
@section('body')
    @include('theme::includes.flash')
    @if (isset($headernav) && $headernav == 'off')
    @else

        @include('pub_theme::layouts.partials.headernav')

    @endif
    <div id="app">
        @yield('content')
        {{-- <cookie-law></cookie-law> --}}

    </div>
    @include('pub_theme::layouts.partials.modal')
    @if (isset($footer) && $footer == 'off')
    @else
        @include('pub_theme::layouts.partials.footer')
    @endif
    @stack('modals')
    @include('cookieConsent::index')
@endsection
