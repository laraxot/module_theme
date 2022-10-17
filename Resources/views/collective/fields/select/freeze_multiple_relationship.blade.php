@php
//dddx(get_defined_vars());
<<<<<<< HEAD
@endphp
=======
@endphp 
>>>>>>> ede0df7 (first)
@foreach($field->value as $row)
    @php
        $row_panel=Panel::make()->get($row);
    @endphp
    <h6>
    <span class="badge badge-pill badge-secondary">
        {{ $row_panel->optionLabel($row)}}
    </span>
    </h6>
@endforeach