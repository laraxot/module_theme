@extends('pub_theme::layouts.app')
@section('content')

<div class="widget">
	<div class="widget-body">
		@if (count($errors) > 0)
		<div class="alert alert-danger">
			<ul>
				@foreach ($errors->all() as $k=>$error)
				<li>{{ $error }}</li>
				@endforeach
			</ul>
		</div>
        @endif
        @php
	if(!is_object($row)) return '';
	$fields=$_panel->editFields();
@endphp
{!! Form::bsOpenPanel($_panel,'update') !!}
@foreach($fields as $field)
	{!! Theme::inputHtml(['row'=>$row,'field'=>$field]) !!}
@endforeach
{{Form::bsSubmit('Modifica')}}
{!! Form::close() !!}

	</div>
</div>




@endsection
{{--
@include('theme::layouts.default.common.action')
--}}

