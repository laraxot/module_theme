@php
	$_panel=Panel::get($row);
@endphp
@can('create', $row)
<a class="btn btn-primary" href="{!! $_panel->createUrl() !!}">
	Crea Nuovo
</a>
@endcan
@can('edit', $row)
<a class="btn btn-primary" href="{!! $_panel->editUrl() !!}">
	Continua a Modificare
</a>
@endcan
@can('index', $row)
<a class="btn btn-primary" href="{!! $_panel->indexUrl() !!}">
	Torna alla Lista
</a>
@endcan