{{-- mixin grid(val)

    if (!imgBasePath)
        - var imgBasePath = 'img/photo/'

    .d-flex.align-items-lg-stretch.mb-4(class=val.class)
        .card.shadow-lg.border-0.w-100.border-0.hover-animate(style=`background: center center url(${val.image}) no-repeat; background-size: cover;`)
<<<<<<< HEAD
            a.tile-link(href=`${path}category.html`)
=======
            a.tile-link(href=`${path}category.html`)  
>>>>>>> ede0df7 (first)
            .d-flex.align-items-center.h-100.text-white.justify-content-center.py-6.py-lg-7
                h3.text-shadow.text-uppercase.mb-0 #{val.name} --}}


<div class="d-flex align-items-lg-stretch mb-4 {{ $class }}">
    <div class="card shadow-lg border-0 w-100 border-0 hover-animate"
        style="background: center center url({{ $image }}) no-repeat; background-size: cover;">
        <a class="tile-link" href="category.html"> </a>
        <div class="d-flex align-items-center h-100 text-white justify-content-center py-6 py-lg-7">
            <h3 class="text-shadow text-uppercase mb-0">{{ $name }}</h3>
        </div>
    </div>
</div>
