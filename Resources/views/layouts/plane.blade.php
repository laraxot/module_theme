<!DOCTYPE html>
<html lang="{{ $lang }}">
@section('htmlheader')
    @include('pub_theme::layouts.partials.htmlheader')
@show
@php

@endphp

<body {!! isset($body_style) ? 'style="' . $body_style . '"' : '' !!}>
    @yield('body')
    @section('scripts')
        @include('pub_theme::layouts.partials.scripts')
    @show
</body>

</html>
