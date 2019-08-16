<div class="row">
    <div class="col">
        <p><span class="primary-color"><strong>{{ number_format($rows->total(),0,',',' ') }}</strong></span> {{ Str::plural($row->post_type) }}</p>
    </div>
	@include('pub_theme::layouts.partials.forms.search')
</div>
{!! Form::bsBtnCreate(['row'=>$row]) !!}
@foreach($rows as $key=>$row)
	@include($_layout->item_view,['key'=>$key,'row'=>$row])
@endforeach
{{ $rows->links() }}
