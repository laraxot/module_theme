@php
Theme::add('theme::js/magnific-popup/magnific-popup.css');
Theme::add('theme::js/magnific-popup/jquery.magnific-popup.min.js');

//dddx(get_defined_vars());

@endphp

<div class="{{-- docs-item --}}" id="{{ $id }}">
    @if (!empty($title))
        <h5 class="text-uppercase mb-4">{{ $title }}</h5>
    @endif
    @if (!empty($desc))
        <div class="{{-- docs-desc --}}">
            <p class="lead">{{ $desc }}</p>
            {{-- <p>Magnific Popup is a responsive lightbox & dialog script with focus on performance and providing best
            experience for user with any device.</p>
        <p><a href="https://dimsemenov.com/plugins/magnific-popup/">Visit plugin website</a></p> --}}
        </div>
    @endif
    <div class="mt-5">
        <div class="row gallery mb-3 ms-n1 me-n1">
            <div {{ $attributes->merge($attrs) }}><a
                    href="{{ Theme::asset('img/photo/photo-1426122402199-be02db90eb90.jpg') }}"
                    data-fancybox="gallery" title="Our street"><img class="img-fluid"
                        src="{{ Theme::asset('img/photo/photo-1426122402199-be02db90eb90.jpg') }}" alt="..."></a>
            </div>
            <div {{ $attributes->merge($attrs) }}><a
                    href="{{ Theme::asset('img/photo/photo-1512917774080-9991f1c4c750.jpg') }}"
                    data-fancybox="gallery" title="Outside"><img class="img-fluid"
                        src="{{ Theme::asset('img/photo/photo-1512917774080-9991f1c4c750.jpg') }}" alt="..."></a>
            </div>
            <div {{ $attributes->merge($attrs) }}><a
                    href="{{ Theme::asset('img/photo/photo-1494526585095-c41746248156.jpg') }}"
                    data-fancybox="gallery" title="Rear entrance"><img class="img-fluid"
                        src="{{ Theme::asset('img/photo/photo-1494526585095-c41746248156.jpg') }}" alt="..."></a>
            </div>
            <div {{ $attributes->merge($attrs) }}><a
                    href="{{ Theme::asset('img/photo/photo-1484154218962-a197022b5858.jpg') }}"
                    data-fancybox="gallery" title="Kitchen"><img class="img-fluid"
                        src="{{ Theme::asset('img/photo/photo-1484154218962-a197022b5858.jpg') }}" alt="..."></a>
            </div>
            <div {{ $attributes->merge($attrs) }}><a
                    href="{{ Theme::asset('img/photo/photo-1522771739844-6a9f6d5f14af.jpg') }}"
                    data-fancybox="gallery" title="Bedroom"><img class="img-fluid"
                        src="{{ Theme::asset('img/photo/photo-1522771739844-6a9f6d5f14af.jpg') }}" alt="..."></a>
            </div>
            <div {{ $attributes->merge($attrs) }}><a
                    href="{{ Theme::asset('img/photo/photo-1488805990569-3c9e1d76d51c.jpg') }}"
                    data-fancybox="gallery" title="Bedroom"><img class="img-fluid"
                        src="{{ Theme::asset('img/photo/photo-1488805990569-3c9e1d76d51c.jpg') }}" alt="..."></a>
            </div>
        </div>
    </div>
</div>
