{{--
@php
	//Str::plural($row->post_type)
@endphp
<div class="row">
    <div class="col">
        <p><span class="primary-color"><strong>{{ number_format($rows->total(),0,',',' ') }}</strong></span> {{ Str::plural($_panel->postType()) }}</p>
    </div>
	@include('pub_theme::layouts.partials.forms.search')
</div>
--}}

@foreach($rows  as $key=>$row)
	@include($_layout->item_view,['key'=>$key,'row'=>$row])
@endforeach
{{ $rows->links('pub_theme::layouts.partials.pagination') }}
