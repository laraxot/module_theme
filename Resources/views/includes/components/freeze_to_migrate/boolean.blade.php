@php

@endphp
{{ $label ?? '' }} 
&nbsp;
@if($field->value)
	<i class="far fa-check-square fa-2x"></i>
@else
	<i class="far fa-square fa-2x"></i>
@endif