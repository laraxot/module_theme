{{-- @props(['heading', 'footer']) --}}

{{-- <div>
    <h6 class="{{ $attrs['titleClass'] }}">{{ $title }}</h6>
    @if ($menus)
        <ul class="{{ $attrs['ulClass'] }}">
            @foreach ($menus as $menu)
                <li>
                    <a class="{{ $attrs['aliClass'] }}" href="{{ $menu['link'] }}"
                        title="">{{ $menu['label'] }}</a>
                    @if ($menu['child'])
                        <ul class="sub-menu">
                            @foreach ($menu['child'] as $child)
                                <li class=""><a href="{{ $child['link'] }}"
                                        title="">{{ $child['label'] }}</a></li>
                            @endforeach
                        </ul><!-- /.sub-menu -->
                    @endif
                </li>
            @endforeach
    @endif

</div> --}}

<div>
    <h6 class="{{ $attrs['titleClass'] }}">{{ $title }}</h6>

    @if ($menus)
        <ul class="{{ $attrs['ulClass'] }}">
            @foreach ($menus as $menu)
                <li>
                    <a class="{{ $attrs['aliClass'] }}" href="{{ $menu['link'] }}">{{ $menu['label'] }}</a>
                    @if ($menu['child'])
                        <ul class="sub-menu">
                            @foreach ($menu['child'] as $child)
                                <li class=""><a href="{{ $child['link'] }}">{{ $child['label'] }}</a>
                                </li>
                            @endforeach
                        </ul><!-- /.sub-menu -->
                    @endif
                </li>
            @endforeach
    @endif

</div>
