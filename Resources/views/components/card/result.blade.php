{{-- <div class="card border-0 shadow mb-3">
    <img class="card-img-top" src="{{ Theme::asset('img/photo/restaurant-1508766917616-d22f3f1eea14.jpg') }}"
        alt="Card image cap">
    <div class="card-body">
        <h4 class="card-title">Card title</h4>
        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's
            content.</p><a class="btn btn-primary" href="#">Go somewhere</a>
    </div>
</div> --}}

<div class="card card-poster gradient-overlay hover-animate mb-4 mb-lg-0">
    <a class="tile-link" href="{{ $url }}"></a>
    <img class="bg-image" src="{{ $img_src }}" alt="Card image">


    <div class="card-img-overlay-top z-index-20">
        <div class="d-flex text-white text-sm align-items-center"><img
                class="avatar avatar-border-white flex-shrink-2 me-4" src="{{ $avatar }}" alt=".">
        </div>
        <div class="badge badge-transparent badge-pill px-13 py-2">{{ $category }}</div>
    </div>



    <div class="card-img-overlay-top text-end">
<<<<<<< HEAD
        <livewire:favorite :model="$model" />
=======
        <livewire:rating::favorite :model="$model" />
>>>>>>> b6141c95 (first)
    </div>


    <div class="card-body overlay-content">
        <h6 class="card-title text-shadow text-uppercase">{{ $title }}</h6>

        {{-- <p class="card-text text-sm">Artist capital of Europe</p> --}}
    </div>
</div>
<<<<<<< HEAD
<livewire:card.poster.result.txt :q="$q" :txt="$txt" :url="$url" />
=======
<livewire:theme::card.poster.result.txt :q="$q" :txt="$txt" :url="$url" />
>>>>>>> b6141c95 (first)
