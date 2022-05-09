<li class="nav-item dropdown"><a class="nav-link dropdown-toggle " id="homeDropdownMenuLink" href="index.html"
        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        {{ $title }}</a>
    @if ($menus)
        <div class="dropdown-menu" aria-labelledby="homeDropdownMenuLink">
            @foreach ($menus as $menu)
                <a class="dropdown-item" href="{{ $menu['link'] }}">{{ $menu['label'] }}</a>
                @if ($menu['child'])
                    <ul class="sub-menu">
                        @foreach ($menu['child'] as $child)
                            <li class="text-muted"><a href="{{ $child['link'] }}"
                                    title="">{{ $child['label'] }}</a></li>
                        @endforeach
                    </ul><!-- /.sub-menu -->
                @endif
            @endforeach
        </div>
    @endif
</li>
