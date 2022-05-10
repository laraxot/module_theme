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
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
        <livewire:input.string-list.color :name="$name" :value="$value" />
=======
        <livewire:theme::input.string-list.color :name="$name" :value="$value" />
>>>>>>> b6141c95 (first)
=======
        <livewire:theme::input.string-list.color :name="$name" :value="$value" />
>>>>>>> 6aa89a58 (first)
=======
        <livewire:theme::input.string-list.color :name="$name" :value="$value" />
>>>>>>> ede0df75 (first)
=======
        <livewire:input.string-list.color :name="$name" :value="$value" />
>>>>>>> ceab487e (.)
=======
        <livewire:input.string-list.color :name="$name" :value="$value" />
>>>>>>> 7f97b271 (up)
=======
        <livewire:theme::input.string-list.color :name="$name" :value="$value" />
>>>>>>> b6141c95 (first)
=======
        <livewire:theme::input.string-list.color :name="$name" :value="$value" />
>>>>>>> 6aa89a58 (first)
=======
        <livewire:theme::input.string-list.color :name="$name" :value="$value" />
>>>>>>> ede0df75 (first)
=======
        <livewire:input.string-list.color :name="$name" :value="$value" />
>>>>>>> ceab487e (.)
        {{-- <input type="text" name="{{ $name }}" />
        <div class="list_color">
            <input type="color">
        </div> --}}
        {{-- Form::select($name, $options, $value, $field->attributes) --}}
    @endslot
@endcomponent

@push('scripts')
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
    <script></script>
=======
    <script>

    </script>
>>>>>>> b6141c95 (first)
=======
    <script>

    </script>
>>>>>>> 6aa89a58 (first)
=======
    <script>

    </script>
>>>>>>> ede0df75 (first)
=======
    <script></script>
>>>>>>> 7f97b271 (up)
=======
    <script>

    </script>
>>>>>>> b6141c95 (first)
=======
    <script>

    </script>
>>>>>>> 6aa89a58 (first)
=======
    <script>

    </script>
>>>>>>> ede0df75 (first)
@endpush
