@php
$name1=$name;
$name1=str_replace('linked[','',$name1);
$name1=str_replace(']','',$name1);
$input_id=$name;
$input_id=str_replace('[','.',$input_id);
$input_id=str_replace(']','',$input_id);
if(isset($attributes['label']))
$label=$attributes['label'];
else
$label=trans('food::privacy.'.$name1);
$placeholder=trans('food::privacy.'.$name1.'_placeholder');
$help=trans('food::privacy.'.$name1.'_help');
$modal_title=trans('food::privacy.'.$name1.'_title');
$modal_txt=trans('food::privacy.'.$name1.'_txt');
Theme::add('theme::css/checkbox.css');
@endphp
<div class="form-group{{ $errors->has($name) ? ' has-error' : '' }}">
	<div class="checkbox">
		<label>
			{{ Form::checkbox($name, 1, $value,array_merge(['class' => 'checkbox','placeholder'=>$placeholder,'id'=>$input_id], $attributes)) }}
			<span class="cr"><i class="cr-icon fa fa-check"></i></span>
			{{-- Form::label($name, $label , ['class' => 'form-check-label']) --}}
			{{ $label }}
		</label>
		<a href="#" data-toggle="modal" data-target="#modal_{{ Str::slug($name1) }}">@lang('pub_theme::txt.read')</a>
	<small class="form-text text-muted">{{ $help }} </small> 
	</div>
	@if ( $errors->has($name) || $errors->has($input_id))
	<span class="help-block" id="{{$input_id}}_help">
			<strong>{{ $errors->first($name) }}</strong>
			<strong>{{ $errors->first($input_id) }}</strong>
	</span>
	@endif
	<!-- Modal -->
	<div class="modal fade" id="modal_{{ Str::slug($name1) }}" tabindex="-1" role="dialog"
		aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-xl" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">{{ $modal_title }}</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					{{ $modal_txt }}
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
	</div>
</div>
