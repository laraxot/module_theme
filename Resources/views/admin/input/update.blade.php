@extends('adm_theme::layouts.app')
@section('content')
	@php
		$data=request()->all();
		$value=$data['test'];
		$row->type=Str::after($row->type,'bs');
	@endphp
	[{{ $value }}]
	{!! Theme::inputFreeze(['field'=>$row,'row'=>$data,'value'=>$value]) !!}	
@endsection