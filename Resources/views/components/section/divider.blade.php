<section class="{{ $attrs['section_class'] }}">
    <img class="bg-image" src="{{ $attrs['img'] }}" alt="" />
    <div class="container">
        <div class="{{ $attrs['div_class'] }}">
            <h3 class="display-3 fw-bold text-serif text-shadow mb-5">
                {{ $title }}
            </h3>
            <a class="btn btn-light" href="{{ $link }}">
                {{ $sub_title }}
            </a>
        </div>
    </div>
</section>
