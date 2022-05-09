<div>
    <article class="b-sm-post">
        <div class="b-sm-post__img-cont">
            <img width="370" height="245" src="{{ $row->image_src }}" alt="post 1">
            <div class="b-sm-post__date">
                <div class="b-sm-post__month">apr</div>
                <div class="b-sm-post__day">29</div>
            </div>
            {{-- tasto share social
            <a href="#html_popup" class="b-sm-post__share html_popup noajax" data-toggle="tooltip" data-placement="left"
                title="Share">
                <i class="fa fa-share-alt" aria-hidden="true"></i>
            </a> --}}
            <div class="b-sm-post__links">
                <a href="#" class="b-sm-post__links__views" data-toggle="tooltip" data-placement="right" title="Views">
                    <i class="fa fa-eye" aria-hidden="true"></i> 137
                </a>
                <a href="#" class="b-sm-post__links__comments" data-toggle="tooltip" data-placement="right"
                    title="Comments">
                    <i class="fa fa-comment-o" aria-hidden="true"></i> 2
                </a>

                <a href="#" class="b-sm-post__tag">{{ $row->tags->first()->title }}</a>

            </div>
        </div>
        <div class="b-sm-post__text-cont">
            <h2 class="b-sm-post__text-cont__link">
                <a href="{{ $panel->url() }}" class="b-sm-post__text-cont__link">
                    {{ $row->title }}
                </a>
            </h2>
            <footer class="b-sm-post__footer">
                <span class="b-sm-post__footer__author">by
                    <a href="#">{{ $row->full_name }}</a>
                </span>
                <span class="b-sm-post__footer__tags">
                    @foreach ($row->tags as $tag)
                        <a href="{{ $panel->url() }}">
                            {{ $tag->title }}
                        </a>
                        @if (!$loop->last)
                            ,
                        @endif
                    @endforeach
                    {{-- <a href="{{ $panel->url() }}">Sport</a>,
                    <a href="{{ $panel->url() }}">People</a> --}}
                </span>
            </footer>
        </div>
    </article>
</div>
