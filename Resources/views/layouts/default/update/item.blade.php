@php
$_panel = Panel::make()->get($row);
@endphp
@can('create', $row)
    <a class="btn btn-primary" href="{!! $_panel->url('create') !!}">
        Crea Nuovo
    </a>
@endcan
@can('edit', $row)
    <a class="btn btn-primary" href="{!! $_panel->url('edit') !!}">
        Continua a Modificare
    </a>
@endcan
@can('index', $row)
    <a class="btn btn-primary" href="{!! $_panel->url('index') !!}">
        Torna alla Lista
    </a>
@endcan
