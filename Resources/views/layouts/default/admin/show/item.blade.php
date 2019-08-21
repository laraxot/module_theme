@php
	$fields=$_panel->fields();
@endphp
<table>
@foreach($fields as $k=>$v)
	<tr>
	  <td>{{ $v->name}}</td>
	    
<<<<<<< HEAD
	  <td> {{ $row->{$v->name} }}</td>
=======
	  <td> 
	  	{{--  
	  	{{ $row->{$v->name} }} 
		--}}
		{!! Theme::inputFreeze(['row'=>$row,'field'=>$v]) !!}
	  </td>
>>>>>>> 9fc4305a99742739f5c5d6b9f988e8b89580f3d0
	</tr>
@endforeach
</table>
