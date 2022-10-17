<div class="mb-3">
    <label class="text-gray-600 small" for="$field->name">{{ $field->label }}</label>
    {{--  
    <input class="form-control form-control-solid" type="text" placeholder="{{ $field->placeholder }}"
        aria-label="Email Address" aria-describedby="emailExample" />
    --}}
    <x-input :field="$field" />
     @if ($errors->has($field->name))
        <div class="alert alert-danger">
            {{ $errors->first($field->name) }}
        </div>
    @endif
</div>
