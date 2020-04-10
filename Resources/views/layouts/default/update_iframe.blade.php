@extends('pub_theme::layouts.app_iframe')
@section('content')
@include('theme::includes.flash')
@php
$params['format']='iframe';
@endphp
<a href="{{ route('container0.container1.index_edit',$params) }}" class="btn btn-secondary">Torna alla Lista</a>

<a href="{{ route('container0.container1.edit',$params) }}" class="btn btn-secondary">Torna a modificare</a>

<a href="{{ route('container0.container1.create',$params) }}" class="btn btn-secondary">Crea Nuovo</a>

 
@endsection