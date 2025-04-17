@php
if (!is_object($row)) {
    return '';
}
$fields = $_panel->getFields(['act' => 'create']);
@endphp
{!! Form::bsOpen($row, 'store') !!}
@foreach ($fields as $field)
    {!! Theme::inputHtml(['row' => $row, 'field' => $field]) !!}
@endforeach
{{ Form::bsSubmit() }}
{{-- $_panel->btnSubmit() --}}
{!! Form::close() !!}
