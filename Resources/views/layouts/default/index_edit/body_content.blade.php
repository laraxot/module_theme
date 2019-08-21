<<<<<<< HEAD
=======
<div class="row">
    <div class="col">
        <p><span class="primary-color"><strong>{{ number_format($rows->total(),0,',',' ') }}</strong></span> {{ Str::plural($row->post_type) }}</p>
    </div>
	@include('pub_theme::layouts.partials.forms.search')
</div>
{!! Form::bsBtnCreate(['row'=>$row]) !!}
>>>>>>> 9fc4305a99742739f5c5d6b9f988e8b89580f3d0
@foreach($rows as $key=>$row)
	@include($_layout->item_view,['key'=>$key,'row'=>$row])
@endforeach
{{ $rows->links() }}
