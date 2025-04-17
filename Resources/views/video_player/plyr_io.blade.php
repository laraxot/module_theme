@extends('pub_theme::layouts.app')
@section('content')
    <br /><br /><br /><br /><br /><br /><br /><br />
    <link rel="stylesheet" href="https://cdn.plyr.io/3.6.11/plyr.css" />
    <script src="https://cdn.plyr.io/3.6.11/plyr.js"></script>
    <div class="col-md-3">
        <video playsinline controls data-poster="/path/to/poster.jpg" class="plyr_video">
            <source src="/videos/Internazionali-TVEh24-20211210-135940-140026.mp4" type="video/mp4" />
            {{-- <source src="/path/to/video.webm" type="video/webm" /> --}}
            <!-- Captions are optional -->
            <track kind="captions" label="English captions" src="/videos/sintel-en.vtt" srclang="en" default />
            <track kind="captions" label="Spanish captions" src="/videos/sintel-es.vtt" srclang="es" />
        </video>
    </div>
    {{-- <div class="col-md-3">
        <video controls crossorigin playsinline
            poster="https://cdn.plyr.io/static/demo/View_From_A_Blue_Moon_Trailer-HD.jpg" class="plyr_video">
            <source src="https://cdn.plyr.io/static/demo/View_From_A_Blue_Moon_Trailer-576p.mp4" type="video/mp4"
                size="576">
            <source src="https://cdn.plyr.io/static/demo/View_From_A_Blue_Moon_Trailer-720p.mp4" type="video/mp4"
                size="720">
            <source src="https://cdn.plyr.io/static/demo/View_From_A_Blue_Moon_Trailer-1080p.mp4" type="video/mp4"
                size="1080">

            <!-- Caption files -->
            <track kind="captions" label="English" srclang="en"
                src="https://cdn.plyr.io/static/demo/View_From_A_Blue_Moon_Trailer-HD.en.vtt" default>
            <track kind="captions" label="Français" srclang="fr"
                src="https://cdn.plyr.io/static/demo/View_From_A_Blue_Moon_Trailer-HD.fr.vtt">
            <!-- Fallback for browsers that don't support the <video> element -->
            <a href="https://cdn.plyr.io/static/demo/View_From_A_Blue_Moon_Trailer-576p.mp4" download>Download</a>
        </video>
    </div> --}}
    <div class="col-md-3">
        <div data-plyr-provider="youtube" data-plyr-embed-id="bTqVqk7FSmY" class="plyr_video"></div>
    </div>


    <script>
        const player = new Plyr('.plyr_video', {
            captions: {
                active: true
            }
        });
        // Expose player so it can be used from the console
        window.player = player;
    </script>

@endsection
