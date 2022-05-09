
@php
    //dddx(get_defined_vars());
    //dddx($_panel->getRow()->{$name});
@endphp
@livewire('theme::chip.simple', ['row' => $_panel->getRow(),'name' => $name])
