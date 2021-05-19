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