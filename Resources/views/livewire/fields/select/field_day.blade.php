<div class="form-group row">
    <label for="{{ $field->name }}" class="col-md-2 col-form-label text-md-right">
        {{ $field->label }}
    </label>
    @php
        $daynames = [
            trans('theme::txt.day_names.sun'),
            trans('theme::txt.day_names.mon'),
            trans('theme::txt.day_names.tue'),
            trans('theme::txt.day_names.wed'),
            trans('theme::txt.day_names.thu'),
            trans('theme::txt.day_names.fri'),
            trans('theme::txt.day_names.sat'),
        ];
    @endphp

    <div class="col-md">
        <select
            id="{{ $field->name }}"
            class="custom-select @error($field->key) is-invalid @enderror"
            wire:model.lazy="{{ $field->key }}">

            <option value="">{{ $field->placeholder }}</option>

            @foreach($daynames as $value => $label)
                <option value="{{ $value }}">{{ $label }}</option>
            @endforeach
        </select>


        @include('theme::livewire.fields.error-help')
    </div>
</div>
