@php
/**
 * da correggere
 * il row inviato e' errato .. da capire dove si perde
 **/
$url0 = Panel::make()->get($row)->url('index_edit');
$url = url()->current();
@endphp
{{ Form::model($last_item, ['url' => $url]) }}
@csrf
{{ Form::bsPivotFields($types) }}
<div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-dismiss="modal">@lang('adm_theme::txt.close')</button>
    <button type="submit" class="btn btn-primary">@lang('theme::txt.update')</button>
</div>
{!! Form::close() !!}
