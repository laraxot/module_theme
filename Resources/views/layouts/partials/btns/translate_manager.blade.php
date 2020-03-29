@php
	//{{ url($lang) }}?act=translate&uri={{ $_SERVER['REQUEST_URI'] }}
	//$url_t=url($lang).'?act=translate&uri='.$_SERVER['REQUEST_URI'];
	$url_t=route('translation.index',array_merge($params,['uri'=>$_SERVER['REQUEST_URI']]));
@endphp
{{-- $url_t --}}
<button type="button" class="btn btn-default" data-toggle="modal" data-target="#myModalAjax" data-title="languages" data-href="{{ $url_t }}">
			<i class="fa fa-language fa-lg" aria-hidden="true"></i> Gestisti Traduzioni
</button>