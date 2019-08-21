@php
	if(!is_object($row)) return '';
<<<<<<< HEAD
	//ddd($row->pivot); //dovrebbe venire fuori piu' di uno
	/*
	$pivot=$row->pivot;
	#foreignKey: "id_trasferte"
		#relatedKey: "id_spese"
		$fk=$pivot->getForeignKey();
		$fk_val=$pivot->getAttributes()[$fk];
		$rk=$pivot->getRelatedKey();
		$rk_val=$pivot->getAttributes()[$rk];
		
		$pivots=$pivot
			->where($fk,$fk_val)
			->where($rk,$rk_val)
			->get()
			;
		ddd($pivots);
[{{$fk}}={{$fk_val}}][{{$rk}}={{$rk_val}}]
		--- funziona ma meglio spostarlo sul crud -----
		*/
    $fields=$_panel->fields();
=======
    $fields=$_panel->editFields();
>>>>>>> 9fc4305a99742739f5c5d6b9f988e8b89580f3d0
@endphp
{!! Form::bsOpen($row,'update') !!}
<div class="row">
@foreach($fields as $field)
    {!! Theme::inputHtml(['row'=>$row,'field'=>$field]) !!}
<<<<<<< HEAD
{{--  
@php
	$input='bs'.studly_case($field->type);
	$input_name=collect(explode('.',$field->name))->map(function ($v, $k){
		return $k==0?$v:'['.$v.']';
	})->implode('');
	$input_value=(isset($field->value)?$field->value:null);
@endphp
<div class="col-sm-{{ isset($field->col_bs_size)?$field->col_bs_size:12 }}">
	{!! Form::$input($input_name) !!}
</div>
--}}
=======
>>>>>>> 9fc4305a99742739f5c5d6b9f988e8b89580f3d0
@endforeach
</div>
{{Form::bs3Submit('Modifica')}}
{!! Form::close() !!}