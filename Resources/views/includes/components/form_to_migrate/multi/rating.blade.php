@php
/**
 *
 *
 */
$model = Form::getModel();
$val = $model->$name;
//$all=$model->{'all_'.$name};
$model_linked = Theme::xotModel(Str::singular($name));
$_panel = Theme::panelModel($model_linked);
$all = $model_linked->get();
//dddx($_panel);
//dddx($val);
//dddx($all);
@endphp


@foreach ($model->ratingObjectives as $i_rating)
    @php
        $rates = $model->ratings->where('post_id', $i_rating->post_id);
        $rating_avg = $rates->avg('pivot.rating');
        $rating_count = $rates->count();
        //dddx($val[$i_rating->post_id]['pivot']['rating']);
    @endphp
    {{ Form::bsRatingStar($name . '[' . $i_rating->post_id . '][pivot][rating]', null, ['label' => $i_rating->title]) }}
@endforeach
