@php
//https://food.local/it/restaurant/pizza-gioia/rating/edit
//$restaurant_curr=collect($params)->where('type','restaurant')->last();
//dddx($second_last);
//dddx($second_last->myRatings);
//[{{ $second_last->index_update_url }}]
$last_container = last($containers);
$types = Str::camel(Str::plural($last_container));
$last_item = last($items);
$second_last = $last_item;
@endphp
{!! Form::bsOpen($second_last, 'index_update') !!}

@foreach ($second_last->ratingObjectives as $i_rating)
    @php
        $rates = $second_last->ratings->where('post_id', $i_rating->post_id);
        $rating_avg = $rates->avg('pivot.rating');
        $rating_count = $rates->count();
    @endphp
    {{-- Form::bsText('myRatings['.$i_rating->post_id.'][pivot][rating]') --}}
    {{ Form::bsRatingStar($types . '[' . $i_rating->post_id . ']', null, ['label' => $i_rating->title, 'help' => $i_rating->subtitle]) }}
    {{-- @include('pub_theme::layouts.partials.rating',['label'=>$i_rating->title,'rating_avg'=>$rating_avg,'rating_count'=>$rating_count]) --}}
@endforeach
{{ Form::bsSubmit('Vota') }}
{!! Form::close() !!}
{{-- {!! Theme::showStyles(false) !!}
{!! Theme::showScripts(false) !!} --}}

{{-- {!! Form::bsOpen($row,'store') !!}
{{ Form::bsText('title') }}
{{ Form::bsText('subtitle') }}
{!! Form::bsTextarea('txt') !!}
{{ Form::bsUnisharpImg('image_src') }}
{{Form::bsSubmit('Aggiungi')}}
{!! Form::close() !!} --}}
