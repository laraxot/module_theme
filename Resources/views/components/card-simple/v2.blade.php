<div class="card-wrapper shadow-sm rounded cmp-list-card-img">
    <div class="card card-img no-after rounded">
        <div class="img-responsive-wrapper cmp-list-card-img__wrapper">
            <div class="img-responsive img-responsive-panoramic h-100">
                <figure class="img-wrapper">
                    <img class="rounded-top img-fluid" src="{{ $img_src }}" title="titolo immagine" alt="descrizione immagine">
                </figure>
                <div class="card-calendar d-flex flex-column justify-content-center">
                    <span class="card-date">26</span>
                    <span class="card-day">Agosto</span>
                    <span class="card-hours">19:00</span>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="category-top cmp-list-card-img__body">
                <a class="text-decoration-none fw-bold cmp-list-card-img__body-heading-title" href="#">Categoria</a>
            </div>
            <h3 class="cmp-list-card-img__body-title">
                <a href="{{ $url }}" class="text-decoration-none">{{ $title }}</a>
            </h3>
            <p class="cmp-list-card-img__body-description">{{ $txt ?? '' }}</p>

            <a class="read-more t-primary text-uppercase cmp-list-card-img__body-link" href="#" aria-label="Leggi di più sulla pagina di {{ $title }}">
                <span class="text">Leggi di più</span>
                <span class="visually-hidden">su {{ $title }}</span>
                <svg class="icon icon-primary icon-xs ml-10">
                    <use href="../assets/bootstrap-italia/dist/svg/sprites.svg#it-arrow-right"></use>
                </svg>
            </a>
        </div>
    </div>
</div>