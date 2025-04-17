{{-- dddx(get_defined_vars()) --}}

<label>
    {{-- $label --}}
</label>


{{-- <input type="datetime-local" {{ $attributes->merge($attrs) }} step="15" />
    <div class="datetime_flatpickr input-group mb-3">
            <input type="datetime-local" {{ $attributes->merge($attrs) }}  />

            <div class="input-group-append">
                <a class="btn btn-outline-secondary" title="toggle" data-toggle>
                    <i class="far fa-calendar-alt"></i>
                </a>
            </div>
            <div class="input-group-append">
                <a class="btn btn-outline-secondary" title="clear" data-clear>
                    <i class="fas fa-times"></i>
                </a>
            </div>

        </div> --}}


@component($field->input_component, get_defined_vars())
    @slot('label')
        <label for="{{ $field->name }}" class="col-md-2 col-form-label text-md-right">
            {{ $field->label }}
        </label>
    @endslot
    @slot('input')
        <input id="{{ $field->key }}" type="datetime-local" class="form-control @error($field->key) is-invalid @enderror"
            autocomplete="{{ $field->autocomplete }}" placeholder="{{ $field->placeholder }}"
            wire:model.lazy="{{ $field->key }}">
        {{-- <div class="col-md datetime_flatpickr">
            <input id="{{ $field->key }}" type="text" class="form-control @error($field->key) is-invalid @enderror"
                autocomplete="{{ $field->autocomplete }}" placeholder="{{ $field->placeholder }}"
                wire:model.lazy="{{ $field->key }}" data-input>

            @include('theme::livewire.fields.error-help')
            <div class="input-group-append">
                <a class="btn btn-outline-secondary" title="toggle" data-toggle>
                    <i class="far fa-calendar-alt"></i>
                </a>
            </div>
            <div class="input-group-append">
                <a class="btn btn-outline-secondary" title="clear" data-clear>
                    <i class="fas fa-times"></i>
                </a>
            </div>
        </div> --}}
    @endslot
@endcomponent
