@php

//dddx(get_defined_vars());
//$model = $this->panel->getRow();
$model = $_panel->getRow();
$rel = $model->{$field->name}();
//dddx(get_class_methods($rel));
if (method_exists($rel, 'getLocalKeyName')) {
    $field_key = 'form_data.' . $rel->getLocalKeyName();
} else {
    $field_key = 'form_data.' . $rel->getForeignKeyName();
}

$val = $rel->first();

$related = $rel->getRelated();
$related_panel = Panel::make()->get($related);
$val_id = $related_panel->optionId($val);
$all = $related->all();

//$field->key='form_data.';
//dddx([$val,$all]);

@endphp

<div class="form-group row">
    <label for="{{ $field->name }}" class="col-md-2 col-form-label text-md-right">
        {{ $field->label }}
    </label>

    <div class="col-md">
        <select id="{{ $field->name }}" class="custom-select @error($field_key) is-invalid @enderror"
            wire:model.lazy="{{ $field_key }}">

            <option value="">{{ $field->placeholder }}</option>

            @foreach ($all as $value)

                <option value="{{ $related_panel->optionId($value) }}" {{-- ($related_panel->optionId($value)==$val_id)?'selected':'' --}}>
                    {{ $related_panel->optionLabel($value) }}</option>
            @endforeach
        </select>

        {{-- @include('laravel-livewire-forms::fields.error-help') --}}
    </div>
</div>
