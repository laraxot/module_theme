<<<<<<< HEAD
@include('theme::layouts.default.common.action')
=======
{{-- @include('theme::layouts.default.common.action') --}}
@extends('pub_theme::layouts.app')
@section('content')
@php
	//$_panel=Panel::get($row);
@endphp
@can('create', $row)
<a class="btn btn-primary" href="{!! $_panel->createUrl() !!}">
	Crea Nuovo
</a>
@endcan
@can('edit', $row)
<a class="btn btn-primary" href="{!! $_panel->editUrl() !!}">
	Continua a Modificare
</a>
@endcan
@can('index', $row)
<a class="btn btn-primary" href="{!! $_panel->indexUrl() !!}">
	Torna alla Lista
</a>
@endcan
@endsection
>>>>>>> b5b3db24c41d93315b0c66431c0d1b9bda40e2b3
