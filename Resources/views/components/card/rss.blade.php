<div class="col-sm-6 col-xl-4 mb-5 hover-animate" data-marker-id="59c0c8e322f3375db4d89128">
    <div class="card h-100 border-0 shadow">
        <div class="card-img-top overflow-hidden dark-overlay bg-cover"
            style="background-image: url({{-- $panel->row->logo --}}); min-height: 200px;">
            <a class="tile-link" href="{{-- $panel->url() --}}"></a>
            <div class="card-img-overlay-bottom z-index-20">
                <h4 class="text-white text-shadow">{{-- $panel->title() --}}</h4>
                {{-- <p class="mb-2 text-xs"><i class="fa fa-star text-warning"></i><i class="fa fa-star text-warning"></i><i
                        class="fa fa-star text-warning"></i><i class="fa fa-star text-warning"></i><i
                        class="fa fa-star text-warning"></i>
                </p> --}}
            </div>
            <div class="card-img-overlay-top d-flex justify-content-between align-items-center">
                {{-- <div class="badge badge-transparent badge-pill px-3 py-2">Restaurant</div> --}}
                {{-- <a
                    class="card-fav-icon position-relative z-index-40" href="javascript: void();">
                    <svg class="svg-icon text-white">
                        <use xlink:href="#heart-1"> </use>
                    </svg></a> --}}

<<<<<<< HEAD
                <livewire:favorite :model="$model">
=======
                <livewire:rating::favorite :model="$model">
>>>>>>> ede0df7 (first)
            </div>
        </div>
        <div class="card-body">
            <p class="text-sm text-muted mb-3">
                {{-- $panel->txt() --}}
            </p>

            <p class="text-sm text-muted text-uppercase mb-1">
                {{-- By <a href="#" class="text-dark">Matt Damon</a> --}}
            </p>
            {{-- Tags
            <p class="text-sm mb-0">
                <a class="me-1" href="#">Restaurant,</a>
                <a class="me-1" href="#">Fusion</a>
            </p> --}}
        </div>
    </div>
</div>
