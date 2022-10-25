@php
	$field=transFields(get_defined_vars());
@endphp
@component($blade_component,get_defined_vars())
	@slot('label')
		{{ Form::label($name, $field->label , ['class' => 'control-label']) }}
	@endslot
	@slot('input')
		@php
			$val1 = Form::getValueAttribute($name);
			//dddx($val1);
		@endphp
		<livewire:input.arr type="text" :name="$name" :value="$val1" label="" modelId="1"></livewire:input.arr>
	@endslot
@endcomponent

