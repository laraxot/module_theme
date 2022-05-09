@php
    //dddx([get_defined_vars(), $form_data['img']]);
@endphp
{{--
<div class="form-group row">
--}}
@component($field->input_component,get_defined_vars())
	@slot('label')
    <label for="{{ $field->name }}" class="col-md-2 col-form-label text-md-right">
        {{ $field->label }}
    </label>
    @endslot
	@slot('input')
    <div class="col-md">
        {{ $form_data['img'] }}
        <input
            id="{{ $field->name }}"
            type="file"
            class="form-control @error($field->key) is-invalid @enderror"
            autocomplete="{{ $field->autocomplete }}"
            placeholder="{{ $field->placeholder }}"
            wire:model.lazy="{{ $field->key }}">

        @include('theme::livewire.fields.error-help')
    </div>
    @endslot
{{--
</div>
--}}
@endcomponent
