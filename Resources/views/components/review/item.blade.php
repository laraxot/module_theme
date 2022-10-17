<div>
    <div class="b-comment">
        <div class="b-comment__avatar"> <img width="90" height="90" class="b-comment__avatar__img"
                src="{{ Theme::asset($avatar) }}" alt="avatar 1">
            <div class="b-comment__avatar__name">{{ $name }}</div>
        </div>
        <div class="b-comment__cont">
            <p>{{ $slot }}</p>
            <div class="b-comment__cont__footer clearfix">
                <div class="b-comment__cont__rating press--left">
                    <div class="rating">
                        @php
                            $roundstars = round($stars);
                        @endphp
                        @for ($i = 0; $i < $roundstars; $i++)
                            <span class="gold">★</span>
                        @endfor
                    </div>
                    ({{ $stars }})
                </div>
                <div class="press--right">{{ $date }}</div>
            </div>
        </div>
    </div>
</div>
