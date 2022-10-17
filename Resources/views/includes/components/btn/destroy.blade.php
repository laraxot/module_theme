@php
/* --sweetaler2 e btnDelete messi nel webpack
 Theme::add('theme/bc/sweetalert2/dist/sweetalert2.min.js');
 Theme::add('theme/bc/sweetalert2/dist/sweetalert2.min.css');
<<<<<<< HEAD
 Theme::add('theme::js/btnDeleteX2.js');
=======
 Theme::add('theme::js/btnDeleteX2.js'); 
>>>>>>> ede0df7 (first)
 //*/
//DestructiveAction
/*
<a class="{{ $btn_class }}" href="#" data-token="{{ csrf_token() }}" data-id="{{ $id }}" data-href="{{ $route }}" data-toggle="tooltip" title="Cancella">
 <i class="far fa-trash-alt"></i>
</a>
*/
@endphp
@php
$tag_attr = [
    'class' => $btn_class . ' btn-confirm-delete btn-danger',
    'href' => '#',
    'data-token' => csrf_token(),
    'data-id' => $id,
    'data-href' => $route,
    'data-toggle' => 'tooltip',
    'title' => 'Destroy',
];
//dddx(http_build_query($tag_attr, '', ' '));//no
$tag_attr = collect($tag_attr)
    ->map(function ($v, $k) {
        return $k . '="' . $v . '"';
    })
    ->implode(' ');
@endphp
<a {!! $tag_attr !!}>
    <i class="far fa-trash-alt"></i>{{-- $route --}}
</a>
