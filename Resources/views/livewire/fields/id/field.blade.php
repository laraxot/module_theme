{{-- Se ID non mostro nulla --}}
{{--
<div wire:model.lazy="{{ $field->key }}"></div>
--}}
<a href="#{{ $form_data[$field->name] ?? ''}}" id="{{ $form_data[$field->name] ?? ''}}">{{ $form_data[$field->name] ?? ''}}</a>
