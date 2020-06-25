@php
	//ddd($_panel);
@endphp
@can('create',$row)
<a class="btn btn-primary" href="{!! $_panel->createUrl() !!}">
	Crea Nuovo
</a>
@endcan
<a class="btn btn-primary" href="{!! url()->previous() !!}">
	Continua a Modificare
</a>
<a class="btn btn-primary" href="{!! $_panel->indexUrl() !!}">
	Torna alla Lista
</a> 