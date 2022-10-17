@extends('adm_theme::layouts.app')
@section('content')
	@php
		$data=request()->all();
		$value=$data['test'];
		$row->type=Str::after($row->type,'bs');
	@endphp
	[{{ $value }}]
<<<<<<< HEAD
	{!! Theme::inputFreeze(['field'=>$row,'row'=>$data,'value'=>$value]) !!}
=======
	{!! Theme::inputFreeze(['field'=>$row,'row'=>$data,'value'=>$value]) !!}	
>>>>>>> ede0df7 (first)
@endsection