@php
	$last_container=last($containers);
	$types=Str::camel(Str::plural($last_container));
	$last_item=last($items);
	$second_last=$last_item;
@endphp
{!! Form::bsOpen($second_last,'index_update') !!}

@foreach($second_last->ratingObjectives as $i_rating)
	@php
		/*
		$rates=$second_last->ratings->where('post_id',$i_rating->post_id);
		$rating_avg=$rates->avg('pivot.rating');
		$rating_count=$rates->count();
		*/
		$field_name=$types.'['.$i_rating->post_id.'][rating]'; //-- forse prima di rating mettere "pivot"
		$field1_name=$types.'['.$i_rating->post_id.'][auth_user_id]';
		$user=\Auth::user();
		if(is_object($user)){
			$auth_user_id=$user->auth_user_id;
		}else{
			$auth_user_id='';
			//forse bloccare tutto
		}
	@endphp
	{{-- Form::bsText('myRatings['.$i_rating->post_id.'][pivot][rating]') --}}
	{{ Form::bsRatingStar($field_name,null,['label'=>$i_rating->title]) }}
	{{ Form::text($field1_name,$auth_user_id) }}
@endforeach
{{Form::bsSubmit('Aggiungi')}} {{-- inutile i 3 tasti --}}
{!! Form::close() !!}
