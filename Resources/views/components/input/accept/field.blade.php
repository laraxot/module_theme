<br />
		<textarea readonly="readonly" class="form-control" rows="6">{{-- $field->text ?? '' --}}</textarea>
		<div class="row">
		<div class="col-md-6 pull-right">
			Accetto {{-- $field->label--}}
		</div>
		<div class="col-md-6">
            {{--
		{{ Form::checkbox($name, 1, $value,$field->attributes) }}
        --}}
        <input type="checkbox" name="{{ $name }}" />
		</div>
</div>