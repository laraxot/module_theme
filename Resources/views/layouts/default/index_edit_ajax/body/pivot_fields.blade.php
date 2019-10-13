@php
	$url=Panel::get($row)->indexEditUrl();
@endphp
{{ Form::model($last_item,['url'=>$url]) }}
@csrf
{{ Form::bsPivotFields($types) }}
{{ Form::bsSubmit('Salva') }}
{{ Form::close() }}