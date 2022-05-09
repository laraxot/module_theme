@php
//dddx($related);
//dddx($pivot_fields);
@endphp

<fieldset>
    <legend>
        {{-- <b>@lang($trad.'.'.$name.'.title')</b> --}}

    </legend>
    <div class="row">
        <div class="col-md-12">
            @foreach ($related as $k => $v)
                <div class="row">
                    {{--  --}}
                    @foreach ($pivot_fields as $pf)
                        @php
                            //$name='ratings';
                            //$input_name=$name.'['.$v->post_id.'][pivot]['.$pf->name.']';
                            $name_dot = $v->post_id . '.pivot.' . $pf->name . '';
                            /*
                            $input_name=dottedToBrackets($input_name);
                            $input_type='bs'.$pf->type;

                            //$input_value=(isset($field->value)?$field->value:null);
                            if(!isset($pf->col_size)) $pf->col_size=12;
                            if(!isset($pf->attributes))  $pf->attributes=[];
                            $input_attrs=$pf->attributes;
                            $input_value=(isset($field->value)?$field->value:null);

                            if($pf->type=='Boolean'){
                            $input_attrs['label']=$v->title;
                            $input_attrs['text']=$v->txt;
                            }
                            if($pf->type=='Hidden' && $pf->name=='title'){ //forzatura
                            $input_value=$v->title;
                            }
                            */
                            /*
                            $rows=$rows->keyBy('post_id');
                            $value=Arr::get($rows,$name_dot);
                            */
                            if ($pf->name == 'rating') {
                                $val = $rows->where('post_id', $v->post_id);
                                $value = $val->avg('pivot.rating');
                                $value_count = $val->count();
                                $pf->txt = $value_count;
                            } else {
                                $rows = $rows->keyBy('post_id');
                                $value = Arr::get($rows, $name_dot);
                            }

                            /*
                            $rating_avg=$val->avg('pivot.rating');
                                    $rating_count=$val->count();
                            dddx($rating_avg);
                            */

                        @endphp
                        {{-- {{ Form::Text($input_name,$input_value,$input_attrs) }}
			[{{ $input_name }}:{{ Arr::get($rows,$input_name) }} ]<hr/>
			[{{ $pf->name }}-{{ $pf->type }}] --}}

                        {!! Theme::inputFreeze([
    'row' => $row,
    'value' => $value,
    'label' => $v->title,
    'field' => $pf,
]) !!}
                        {{--  --}}

                    @endforeach
                </div>
            @endforeach
        </div>
        {{-- <div class="col-md-4">

		@foreach ($pivot_panel->actions() as $act)
			{!! $act->btn() !!}
		@endforeach
	</div> --}}
    </div>
</fieldset>

{{-- <button type="button" class="btn btn-red btn-danger" data-toggle="modal" data-target="#myModalAjax" data-title="rate it" data-href="">
			<span class="font-white"><i class="fa fa-star"></i> Vota !</span>
		</button> --}}
