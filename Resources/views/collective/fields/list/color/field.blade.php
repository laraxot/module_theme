@php
if (isset($options['field'])) {
    //$options = $options['field']->options;
}
extract($attributes);
$field = transFields(get_defined_vars());
$value = Form::getValueAttribute($name);
@endphp

@component($blade_component, get_defined_vars())
    @slot('label')
        {{ Form::label($name, $field->label, ['class' => 'control-label']) }}
    @endslot
    @slot('input')
<<<<<<< HEAD
        <livewire:input.string-list.color :name="$name" :value="$value" />

=======
        <livewire:theme::input.string-list.color :name="$name" :value="$value" />
>>>>>>> ede0df7 (first)
        {{-- <input type="text" name="{{ $name }}" />
        <div class="list_color">
            <input type="color">
        </div> --}}
        {{-- Form::select($name, $options, $value, $field->attributes) --}}
    @endslot
@endcomponent

@push('scripts')
<<<<<<< HEAD

=======
    <script>

    </script>
>>>>>>> ede0df7 (first)
@endpush
