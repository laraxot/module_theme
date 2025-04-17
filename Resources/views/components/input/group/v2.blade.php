@props([
    //'label' => 'label',
    //'for' => false,
    //'noShadow' => false,
    //'isRequired' => false,
    //'error' => false,
    //'helpText' => false,
    //'optional' => false,
    'name' => null,
    'label' => null,
])
<div class="row">
    <x-input.label {{ $label_attrs->merge(['class'=>"col-sm-2 col-form-label"]) }} />
    <div class="col-sm-7">
        <div class="form-group{{ $errors->has($name) ? ' has-danger' : '' }}">
            <x-input {{ $input_attrs }} :options="$options" />
            @error($name)
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
    </div>
</div>