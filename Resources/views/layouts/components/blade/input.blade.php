<div class="form-group{{ $errors->has($name) ? ' has-error' : '' }}">
	{{ $label }}
	{{ $input }}
	<small class="form-text text-muted">{{ trans($lang.'.'.$name.'_help') }} </small>
</div>