<<<<<<< HEAD
@include('theme::layouts.default.common.action')
=======
{{-- @include('theme::layouts.default.common.action') --}}
@extends('pub_theme::layouts.app')
@section('content')
@php
	$fields=$_panel->fields();
	//ddd(get_class($row));
@endphp
<table>

@foreach($fields as $k=>$v)
	<tr>
	  <td>{{ $v->name}}</td>
	    
	  <td> {{ $row->{$v->name} }}</td>
	</tr>
@endforeach
</table>
@endsection
>>>>>>> b5b3db24c41d93315b0c66431c0d1b9bda40e2b3
