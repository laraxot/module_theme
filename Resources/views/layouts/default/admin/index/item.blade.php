@php
	// nella lista la password e conferma password posso ometterle
	/*
	$fields=collect($_panel->fields())->filter(function($item){
		return !in_array($item->type,['Password']);
	})->all();
	*/
	$fields=$_panel->indexFields();
@endphp
@if($loop->first)
<table>
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
<<<<<<< HEAD
=======
				@if($loop->first)
					@foreach($_panel->itemActions() as $act)
						{!! $act->btn(['row'=>$row]) !!}
					@endforeach
				@endif
>>>>>>> 9fc4305a99742739f5c5d6b9f988e8b89580f3d0
				{{--  
				@php
					$field_name=str_replace(['[',']'],['.',''],$field->name);
				@endphp
				{{ \Arr::get($row,$field_name) }} 
				--}}
				{{-- $field->type --}}
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