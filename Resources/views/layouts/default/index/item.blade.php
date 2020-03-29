@php
	$fields=$_panel->fields();
@endphp
@if($loop->first)
<table class="table">
	<thead>
		<tr>
			@foreach($fields as $field)
			<td>{{ $field->name }}</td>
			@endforeach
			<td></td>
		</tr>
	</thead>
	<tbody>
		@endif
		<tr>
			@foreach($fields as $field)
			<td>
				@php
					
				@endphp
				{{ \Arr::get($row,str_replace(['[',']'],['.',''],$field->name)) }}
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