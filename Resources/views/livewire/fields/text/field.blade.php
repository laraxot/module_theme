@component($field->input_component,get_defined_vars())
{{--
<div class="form-group row">
--}}
    @slot('label')
        <label for="{{ $field->name }}" class="col-md-2 col-form-label text-md-right">
            {{ $field->label }}
        </label>
    @endslot
	@slot('input')
        <div class="col-md">
            <input
                {{--id="{{ $field->name }}"--}}
                id="{{ $field->key }}"
                type="text"
                class="form-control @error($field->key) is-invalid @enderror"
                autocomplete="{{ $field->autocomplete }}"
                placeholder="{{ $field->placeholder }}"
                wire:model.lazy="{{ $field->key }}">

            @include('theme::livewire.fields.error-help')
        </div>
    @endslot
@endcomponent
{{--
</div>
--}}
