@php

$model = Form::getModel();
//dddx(get_class($model).' '.$name); //Modules\Food\Models\Profile
if (!method_exists($model, $name)) {
    dddx('create relationship [' . $name . '] on [' . get_class($model) . ']');
}
$user = Auth::user();
$user_id = is_object($user) ? $user->user_id : 'NO-SET';

$pivot_class = $model->$name()->getPivotClass();
$pivot = new $pivot_class();
$pivot_panel = Theme::panelModel($pivot);
$pivot_fields = $pivot_panel->fields();

$val = $model->$name;
//$val=$val->keyBy('post_id');
//dddx($val->keyBy('post_id'));

//dddx($name);//privacies
//$all=$model->{'all_'.$name};
$model_linked = Theme::xotModel(Str::singular($name));
$_panel = Theme::panelModel($model_linked);
$all = !is_null($model_linked) ? $model_linked->get() : [];
//dddx($all);
@endphp
<ul>
    @foreach ($all as $k => $v)
        @php
            $input_name = $name . '[' . $v->post_id . ']';
            $input_value = 1;
            $obj = $val->firstWhere('post_id', $v->post_id);
            
            if (is_object($obj)) {
                $checked = $obj->pivot->value;
            } else {
                $checked = 0;
            }
            $options = ['class' => 'form-control'];
        @endphp
        <li>
            {{-- {{ Form::checkbox($input_name.'[value]', $input_value, $checked,$options) }}
	{{ Form::text($input_name.'[value]', $checked ) }}
	{{ Form::text($input_name.'[title]',$v->title) }}
	{{ Form::text($input_name.'[user_id]',\Auth::user()->id) }} --}}
            @foreach ($pivot_fields as $pf)
                {{ $pf->name }}
                {{-- @if ($loop->first)
			@endif
			{{ Form::text($input_name.'['.$pf->name.']') }} --}}
                {{ Form::text($input_name . '[pivot][' . $pf->name . ']') }}
            @endforeach

            {{ $_panel->optionId($v) }} - {{ $_panel->optionLabel($v) }} [user_id: {{ $user_id }}]
        </li>
    @endforeach
</ul>
