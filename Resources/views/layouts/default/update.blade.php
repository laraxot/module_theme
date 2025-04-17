@extends('pub_theme::layouts.app')
@section('content')
    {!! $_panel->btnHtml(['act' => 'create']) !!}
    {!! $_panel->btnHtml(['act' => 'edit']) !!}
    {!! $_panel->btnHtml(['act' => 'index']) !!}
@endsection
