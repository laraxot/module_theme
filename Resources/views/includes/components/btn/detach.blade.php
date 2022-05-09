{{-- <a class="{{ $btn_class }}" href="{{ $route }}" data-toggle="tooltip" title="Scollega">
    <i class="fas fa-unlink" aria-hidden="true"></i>
</a> --}}
@php
$tag_attr = [
    'class' => $btn_class . ' btn-confirm-delete btn-danger',
    'href' => '#',
    'data-token' => csrf_token(),
    'data-id' => $id,
    'data-href' => $route,
    'data-toggle' => 'tooltip',
    'title' => 'Detach',
];
//dddx(http_build_query($tag_attr, '', ' '));//no
$tag_attr = collect($tag_attr)
    ->map(function ($v, $k) {
        return $k . '="' . $v . '"';
    })
    ->implode(' ');
@endphp
<a {!! $tag_attr !!}>
    <i class="fas fa-unlink fa-fw" aria-hidden="true"></i>{{-- $route --}}
</a>
