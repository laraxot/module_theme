@php
	$fields=$_panel->fields();
@endphp
<table>
@foreach($fields as $k=>$v)
	<tr>
	  <td>{{ $v->name}}</td>
<<<<<<< HEAD

	  <td>
	  	{{--
	  	{{ $row->{$v->name} }}
=======
	    
	  <td> 
	  	{{--  
	  	{{ $row->{$v->name} }} 
>>>>>>> ede0df7 (first)
		--}}
		{!! Theme::inputFreeze(['row'=>$row,'field'=>$v]) !!}
	  </td>
	</tr>
@endforeach
</table>
