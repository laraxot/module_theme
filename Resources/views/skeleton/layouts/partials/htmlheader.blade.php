<head>
    {!! Theme::metatags() !!}
    @php
        Theme::add('pub_theme::css/xot.css');
    @endphp
    {!! Theme::showStyles(false) !!}
    @stack('styles')
</head>
