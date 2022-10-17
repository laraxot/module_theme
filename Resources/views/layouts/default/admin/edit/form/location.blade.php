@if(is_object($row))
{!! Form::bsOpen($row,'update') !!}
@else
{!! Form::bsOpen($second_last,'update') !!}
@endif
<<<<<<< HEAD
<div class="row">
=======
<div class="row"> 
>>>>>>> ede0df7 (first)
	<div class="col-md-8">
		{{ Form::bsText('route') }}
	</div>
	<div class="col-md-4">
		{{ Form::bsText('street_number') }}
	</div>
</div>
<<<<<<< HEAD
<div class="row">
	<div class="col-md-4">
		{{ Form::bsText('postal_code') }}
	</div>
	<div class="col-md-8">
=======
<div class="row"> 
	<div class="col-md-4">
		{{ Form::bsText('postal_code') }}
	</div>
	<div class="col-md-8"> 
>>>>>>> ede0df7 (first)
		{{ Form::bsText('locality') }}
	</div>
</div>
{{ Form::bsText('administrative_area_level_2_short') }}
{{-- Form::hidden('country_short',App::getLocale()) --}}
{{ Form::bsSubmit('Modifica') }}
{{ Form::close() }}