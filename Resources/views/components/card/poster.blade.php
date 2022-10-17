<div class="card card-poster gradient-overlay hover-animate mb-4 mb-lg-0">
    <a class="tile-link" href="{{ $url }}"></a>
    <img class="bg-image" src="{{ $img_src }}" alt="Card image">


    <div class="card-img-overlay-top z-index-20">
        <div class="d-flex text-white text-sm align-items-center"><img
                class="avatar avatar-border-white flex-shrink-2 me-4" src="{{ $avatar }}" alt=".">
        </div>
        <div class="badge badge-transparent badge-pill px-13 py-2">{{ $category }}</div>
    </div>


<<<<<<< HEAD
    {{-- 
    <div class="card-img-overlay-top text-end">
        <livewire:favorite :model="$model" />
    </div>
    --}}

    {{ $favorite }}
=======

    <div class="card-img-overlay-top text-end">
        <livewire:rating::favorite :model="$model" />
    </div>
>>>>>>> ede0df7 (first)


    <div class="card-body overlay-content">
        <h6 class="card-title text-shadow text-uppercase">{{ $title }}</h6>
        {{-- <p class="card-text text-sm">Artist capital of Europe</p> --}}
    </div>
</div>
