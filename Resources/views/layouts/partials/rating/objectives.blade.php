@php
	$parz=[];
	$parz['container0']=$row->post_type;
	$parz['item0']=$row->guid;
	$parz['container1']='rating';
	$rating_url=route('container0.container1.index_edit',$parz);
@endphp
<div class="row">
<div class="col-sm-8 col-md-8">
@foreach($row->ratingObjectives as $i_rating)
    @php
        $rates=$row->ratings->where('post_id',$i_rating->post_id);
        $rating_avg=$rates->avg('pivot.rating');
        $rating_count=$rates->count();
    @endphp
    @include('theme::layouts.partials.rating.item',['label'=>$i_rating->title,'rating_avg'=>$rating_avg,'rating_count'=>$rating_count])
@endforeach
</div>
<div class="col-sm-4 col-md-4">
	<button type="button" class="btn btn-red btn-danger" data-toggle="modal" data-target="#myModalAjax" data-title="rate it" data-href="{{ $rating_url }}">
		<span class="font-white"><i class="fa fa-star"></i> Vota !</span>
	</button>
</div>
</div>