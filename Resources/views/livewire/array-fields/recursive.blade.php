@if (is_array($value[$array_field->name]))
    @include('theme::livewire.array-fields.array')
@else
    @include('theme::livewire.array-fields.input')
@endif
