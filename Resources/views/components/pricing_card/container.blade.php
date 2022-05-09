@php
$highlight = '';
if ($attrs['highlight'] === 'true') {
    $highlight = 'card-highlight';
}
@endphp

<div id="{{ $attrs['id'] }}">

    <div class="card mb-5 mb-lg-0 border-0 {{ $highlight }} shadow-lg">
        <div class="card-status bg-primary"></div>
        <div class="card-body">
            <h2 class="text-base subtitle text-center text-primary py-3">{{ $attrs['title'] }}</h2>
            <p class="text-muted text-center"><span class="h1 text-dark">{{ $attrs['price'] }}</span><span
                    class="ms-2">/
                    {{ $attrs['period'] }}</span></p>
            <hr>
            <ul class="fa-ul m-4">
                {{ $slot }}
            </ul>
            <div class="text-center"><a class="btn btn-outline-primary" href="#">Select</a></div>
        </div>
    </div>
</div>
