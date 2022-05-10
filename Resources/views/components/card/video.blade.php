<!--Card-->
<div class="card" style="width: 18rem;">
    <!--Card image-->
    <video class="img-fluid" controls playsinline {{-- autoplay muted loop --}}>
        <source src="{{ $videoSrc }}" type="video/mp4">
    </video>
    <!--Card content-->
    <div class="card-body">
<<<<<<< HEAD
<<<<<<< HEAD
        @if (isset($title))
            <!--Title-->
            <h4 class="card-title">{{ $title }}</h4>
        @endif
        <p class="card-text">{{ $txt ?? '' }}</p>
        {{-- <a href="#" class="btn btn-primary">Button</a> --}}
    </div>
</div>
<!--/.Card-->
=======
=======
>>>>>>> 6aa89a58 (first)
        <!--Title-->
        <h4 class="card-title">Card title</h4>
        <!--Text-->
        <p class="card-text">{{ $txt ?? '' }}</p>
        {{--
        <a href="#" class="btn btn-primary">Button</a>
        --}}
    </div>
</div>
<<<<<<< HEAD
<!--/.Card-->
>>>>>>> b6141c95 (first)
=======
<!--/.Card-->
>>>>>>> 6aa89a58 (first)
