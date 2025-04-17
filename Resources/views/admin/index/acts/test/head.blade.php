<div class="btn-group" role="group">
    @foreach ($existings as $existing)
        <a class="btn btn-secondary {{ $input == $existing ? 'active' : '' }}"
            href="{{ Request::fullUrlWithQuery(['input' => $existing]) }}">
            {{ $existing }}
        </a>
    @endforeach
</div>
