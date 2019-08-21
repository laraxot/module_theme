<<<<<<< HEAD
@include('theme::layouts.default.index.item')
 
=======
@php
	$fields=$_panel->indexFields();
@endphp
@if($loop->first)
<table class="table">
	<thead>
		<tr>
			@foreach($fields as $field)
			<td>{{ str_replace('_',' ',$field->name) }}</td> 
			@endforeach
			<td></td>
		</tr>
	</thead>
	<tbody>
		@endif
		<tr>
			@foreach($fields as $field)
			<td>
				{!! Theme::inputFreeze(['row'=>$row,'field'=>$field]) !!}
			</td>
			@endforeach
			<td>
				{!! Form::bsBtnCrud(['row'=>$row]) !!}
			</td>
		</tr>
		@if($loop->last)
	</tbody>
</table>
@endif
>>>>>>> 9fc4305a99742739f5c5d6b9f988e8b89580f3d0
