<head>
    {!! Theme::metatags() !!}
    @php
        //Bootstrap core CSS
        Theme::add('pub_theme::css/bootstrap.min.css', 1);
        Theme::add('pub_theme::css/font-awesome.min.css');
        Theme::add('pub_theme::css/style-child.css');
        //Theme::add('pub_theme::css/animsition.min.css');
        //Theme::add('pub_theme::js/animsition.min.js');
        Theme::add('/theme/bc/animsition/dist/css/animsition.min.css');
        Theme::add('/theme/bc/animsition/dist/js/animsition.min.js');

        Theme::add('pub_theme::css/animate.css');
        //Custom styles for this template
        Theme::add('pub_theme::css/style.css');
        Theme::add('/theme/bc/cookieconsent/build/cookieconsent.min.css');
        Theme::add('/theme/bc/cookieconsent/build/cookieconsent.min.js');
        Theme::add('pub_theme::css/xot.css');
        @include 'pub_theme::manychat.snip01';
    @endphp
    {!! Theme::showStyles(false) !!}
    @stack('styles')
    @yield('cssAdd')
</head>
