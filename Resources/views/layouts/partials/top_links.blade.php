
<!-- top Links -->
<div class="top-links">
    <div class="container">
        <ul class="row links justify-content-center">
            @for($i=1;$i<=4;$i++)
            <li class="list-inline-item  link-item {{ $step==$i?'active':'' }}">
                <span>{{ $i }}</span>
                <a href="#">@lang('pub_theme::top_links.step'.$i)</a>
            </li>
            @endfor
        </ul>
    </div>
</div>
<!-- end:Top links -->
