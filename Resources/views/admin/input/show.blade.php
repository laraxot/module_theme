@extends('adm_theme::layouts.app')
@section('content')
@php
	$input_type=$row->type;
@endphp

{{ Form::open() }}
@method('put')
{{ Form::$input_type('test') }}
{{ Form::bsSubmit('test') }}
{{ Form::close() }}
@endsection