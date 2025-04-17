<div class="col-md-4 col-md-offset-0 col-sm-8 col-sm-offset-2 col-xs-12">
    <div class="b-price-card">
        <div class="b-price-card__img"> <img width="{{ $width }}" height="{{ $height }}"
                class="b-price-card__img__img" src="{{ Theme::asset($imgurl) }}" alt="plan 1">
            <h4 class="b-price-card__title">{{ $title }}</h4>
            <div class="b-price-card__price"><b class="b-price-card__price__digit">{{ $price }}</b></div>
        </div>
        <div class="b-price-card__cont">
            {{ $slot }}
            <a href="Single-Post_Standart.html" class="btn">Get started</a>
        </div>
    </div>
</div>
