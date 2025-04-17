<div class="card" {!! null !=='style' ? 'style="' . $style . '"' : '' !!}>
    <div class="card-header" style="background-color:{{ $head_bg_color ?? '' }}">
        {{ $title }}
    </div>
    <div class="card-body">
        {{ $content }}
    </div>
    <ul class="list-group list-group-flush">
        @foreach ($items as $item)
            <li class="list-group-item">{!! $item !!}</li>
        @endforeach
    </ul>
    {{--
    <div class="card-footer">
        Card footer
    </div>
    --}}
</div>
