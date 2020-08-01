@php
	// nella lista la password e conferma password posso ometterle
	/*
	$fields=collect($_panel->fields())->filter(function($item){
		return !in_array($item->type,['Password']);
	})->all();
    */
	$fields=$_panel->indexFields();
	$row_panel=Panel::get($row);
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

					@if($loop->first)
						@foreach($row_panel->itemActions() as $act)
							{{--
								{!! $act->btn(['row'=>$row,'panel'=>Panel::get($row)]) !!}
							--}}

							{!! $act->btnHtml() !!}
						@endforeach
					@endif
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
