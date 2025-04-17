@php

$name_dot = bracketsToDotted($name);
if (!isset($field->help)) {
    $field->help = trans($view . '.field.' . $name . '_help');
}
$group_class = '';

if (isset($field->params['attributes']['group_class'])) {
    $group_class = $field->params['attributes']['group_class'];
}
@endphp



<div class="col-sm-{{ $field->col_size }}">
    <div class="form-group{{ $errors->has($name) ? ' has-error' : '' }} {{ $group_class }}">
        {{ $label }}
        <div>{{ $input }}</div>
        @if ($errors->has($name_dot))
            <div class="alert alert-danger">
                {{ $errors->first($name_dot) }}
            </div>
        @endif
        @if ($field->help != '')
            <small class="form-text text-muted">{{ $field->help }}</small>
        @endif

        {{ $label }} {{ Form::checkbox('name', 'value', ['style' => 'width: 100px; height: 100px:']) }}
    </div>
</div>

{{-- <form action="/action_page.php">
    <input type="checkbox" id="vehicle1" name="vehicle1" value="Bike">
    <label for="vehicle1"> I have a bike</label><br>
    <input type="checkbox" id="vehicle2" name="vehicle2" value="Car">
    <label for="vehicle2"> I have a car</label><br>
    <input type="checkbox" id="vehicle3" name="vehicle3" value="Boat">
    <label for="vehicle3"> I have a boat</label><br><br>
</form> --}}
