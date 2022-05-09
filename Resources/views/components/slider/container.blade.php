<div class="swiper-container swiper-container-mx-negative items-slider-full px-lg-5 pt-3 swiper-container-horizontal">
    <!-- Additional required wrapper-->
    <div class="swiper-wrapper pb-5" style="transition-duration: 0ms; transform: translate3d(-1505px, 0px, 0px);">


        @foreach ($data as $item)
            <div class="swiper-slide h-auto px-2" data-swiper-slide-index="{{-- $loop->index --}}"
                style="width: 281px; margin-right: 20px;">
                <!-- venue item-->
                <div class="w-100 h-100 hover-animate" {{-- data-marker-id="59c0c8e3a31e62979bf147c9" --}}>
                    <div class="card h-100 border-0 shadow">
                        <div class="card-img-top overflow-hidden dark-overlay bg-cover"
                            style="background-image: url({{ $item->poster_path }}); min-height: 200px;">
                            <a class="tile-link" href="{{-- detail.html --}}"></a>
                            <div class="card-img-overlay-bottom z-index-20">
                                <h4 class="text-white text-shadow">{{ $item->media_title }}</h4>

                                <x-star :value="$item->vote_average" />

                            </div>
                            <div class="card-img-overlay-top d-flex justify-content-between align-items-center">
                                <div class="badge badge-transparent badge-pill px-3 py-2">
                                    {{ $item->original_language }}
                                </div>
                                {{-- <a
                                class="card-fav-icon position-relative z-index-40"
                                href="javascript: void();">

                                <svg class="svg-icon text-white">
                                    <use xlink:href="#heart-1"> </use>
                                </svg></a> --}}
                            </div>
                        </div>
                        <div class="card-body">
                            <p class="text-sm text-muted mb-3">
                                {{ substr($item->txt, 0, 150) }}...
                            </p>
                            {{-- <p class="text-sm text-muted text-uppercase mb-1">By <a href="#"
                                class="text-dark">Matt Damon</a></p>
                        <p class="text-sm mb-0"><a class="me-1" href="#">Music,</a><a
                                class="me-1" href="#">Techno,</a><a class="me-1"
                                href="#">House</a>
                        </p> --}}

                            <p class="text-sm text-muted text-uppercase mb-1">
                                Popularity
                                {{ $item->popularity }}
                            </p>
                            <p class="text-sm mb-0">
                                {{ $item->vote_count }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <!-- If we need pagination-->
    <div class="swiper-pagination swiper-pagination-clickable swiper-pagination-bullets swiper-pagination-bullets-dynamic"
        style="width: 80px;"><span
            class="swiper-pagination-bullet swiper-pagination-bullet-active swiper-pagination-bullet-active-main"
            tabindex="0" role="button" aria-label="Go to slide 1" style="left: 32px;"></span><span
            class="swiper-pagination-bullet swiper-pagination-bullet-active-next" tabindex="0" role="button"
            aria-label="Go to slide 2" style="left: 32px;"></span><span
            class="swiper-pagination-bullet swiper-pagination-bullet-active-next-next" tabindex="0" role="button"
            aria-label="Go to slide 3" style="left: 32px;"></span><span class="swiper-pagination-bullet" tabindex="0"
            role="button" aria-label="Go to slide 4" style="left: 32px;"></span><span class="swiper-pagination-bullet"
            tabindex="0" role="button" aria-label="Go to slide 5" style="left: 32px;"></span><span
            class="swiper-pagination-bullet" tabindex="0" role="button" aria-label="Go to slide 6"
            style="left: 32px;"></span><span class="swiper-pagination-bullet" tabindex="0" role="button"
            aria-label="Go to slide 7" style="left: 32px;"></span><span class="swiper-pagination-bullet" tabindex="0"
            role="button" aria-label="Go to slide 8" style="left: 32px;"></span><span class="swiper-pagination-bullet"
            tabindex="0" role="button" aria-label="Go to slide 9" style="left: 32px;"></span><span
            class="swiper-pagination-bullet" tabindex="0" role="button" aria-label="Go to slide 10"
            style="left: 32px;"></span></div>
    <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span>
</div>
