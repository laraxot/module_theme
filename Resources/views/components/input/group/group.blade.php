{{--  
@props([
    'label' => 'label',
    'for' => false,
    'noShadow' => false,
    'isRequired' => false,
    'error' => false,
    'helpText' => false,
    'optional' => false,
])

<br/>[attributes: {{ $attributes }} ]
<br/>[div: {{ $div_attrs }}]
<br/>[label: {{ $label_attrs }} ]
<br/>[input: {{ $input_attrs }} ]
--}}
<div {{ $div_attrs }}>
    <x-input.label {{ $label_attrs }} />
    <x-input {{ $input_attrs }} />
</div>
