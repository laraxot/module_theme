{{-- 'pub_theme::img/src/banner-2.jpg' --}}

<div class="b-counter2 b-parallax lazy" data-type="background" data-speed="8" data-src="{{ Theme::asset($img) }}">
    <div class="b-placeholder"></div>
    <div class="container">
        <div class="row">
            {{ $slot }}
        </div>
    </div>
</div>
