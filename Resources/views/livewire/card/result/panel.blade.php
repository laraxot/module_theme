<div>
    <div class="card h-100 border-0 shadow">
        <div class="card-img-top overflow-hidden gradient-overlay">
            <img class="img-fluid" src="img/photo/photo-1484154218962-a197022b5858.jpg"
                alt="Modern, Well-Appointed Room">
            <a class="tile-link" href="detail-rooms.html"></a>
            <div class="card-img-overlay-bottom z-index-20">
                <div class="d-flex text-white text-sm align-items-center">
                    <img class="avatar avatar-border-white flex-shrink-0 me-2" src="img/avatar/avatar-0.jpg"
                        alt="Pamela">
                    <div>Pamela</div>
                </div>
            </div>
            <div class="card-img-overlay-top text-end">
                <a class="card-fav-icon position-relative z-index-40" href="javascript: void();">
                    <svg class="svg-icon text-white">
                        <use xlink:href="#heart-1"> </use>
                    </svg></a>
            </div>
        </div>
        <div class="card-body d-flex align-items-center">
            <div class="w-100">
                <h6 class="card-title">
                    <a class="text-decoration-none text-dark" href="detail-rooms.html">Modern,
                        [{{ $pos }}]
                    </a>
                </h6>

                <p>{!! $html !!} </p>

                <button wire:click="goPrev()">indietro</button>
                <button wire:click="goNext()">avanti</button>
            </div>
        </div>
    </div>
</div>
