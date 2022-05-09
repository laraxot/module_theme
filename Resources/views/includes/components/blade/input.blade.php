<div class="form-group{{ $errors->has($name) ? ' has-error' : '' }}">
	{{ $label }}
	{{ $input }}
	{{--  
	@if(trans($lang.'.'.$name.'_help')!=$lang.'.'.$name.'_help')
	<small class="form-text text-muted">{{ trans($lang.'.'.$name.'_help') }} </small>
	@endif
	--}}
</div>