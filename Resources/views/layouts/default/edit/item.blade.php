@php
if (!is_object($row)) {
    return '';
}
$fields = $_panel->getFields(['act' => 'edit']);
@endphp
{!! Form::bsOpen($row, 'update') !!}
@foreach ($fields as $field)
    {!! Theme::inputHtml(['row' => $row, 'field' => $field]) !!}
@endforeach
{{ Form::bsSubmit('Modifica') }}
{!! Form::close() !!}
