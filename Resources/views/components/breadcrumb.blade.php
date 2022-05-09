{{-- https://getbootstrap.com/docs/4.5/components/breadcrumb/ --}}

<nav aria-label="breadcrumb">
    <ol class="breadcrumb {{ $olClass }}">
        <li class="breadcrumb-item"><a href="#">Home</a></li>
        @foreach ($panel->getBreads() as $value)
            <li class="breadcrumb-item">
                <a href="#">{{ $value->getName() }}</a>
            </li>
            <li class="breadcrumb-item">
                <a href="#">{{ $value->guid() }}</a>
            </li>
        @endforeach
        {{-- <li class="breadcrumb-item"><a href="#">Library</a></li>
        <li class="breadcrumb-item active" aria-current="page">Data</li> --}}
    </ol>
</nav>
