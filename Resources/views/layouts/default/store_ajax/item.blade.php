@php
	//ddd($_panel);
@endphp

<a class="btn btn-primary" href="{!! $_panel->createUrl() !!}">
	Crea Nuovo
</a>
<a class="btn btn-primary" href="{!! $_panel->editUrl() !!}">
	Continua a Modificare
</a>
<a class="btn btn-primary" href="{!! $_panel->indexUrl() !!}">
	Torna alla Lista
</a>