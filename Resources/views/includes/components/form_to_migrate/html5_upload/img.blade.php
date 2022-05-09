@php
	//Theme::add($comp_view.'/js/html5imageupload.js');
	//Theme::add($comp_view.'/css/html5imageupload.css');
	//Theme::add($comp_view.'/css/glyphicons.css');
	//Theme::add($comp_view.'/css/style.css'); 

	$label=isset($attributes['label'])?$attributes['label']:trans($view.'.field.'.$name);
	$placeholder=isset($attributes['placeholder'])?$attributes['placeholder']:trans($view.'.field.'.$name.'_placeholder');
@endphp

<div class="form-group"> 
    <label>{{ $label }}</label> {{-- url('it/image?_act=canvas') --}}
    <div class="dropzone" data-width="400" data-height="400" data-url="{{ url('it/image?_act=canvas') }}"  style="width: 100%;" data-image="{{ $value }}" data-name="{{ $name }}">
     	{{ Form::file($name.'_thumb', $value, array_merge(['id'=>$name.'_thumb', 'class' => 'form-control'], $attributes)) }}
	</div>
	{{ Form::text($name, $value, array_merge(['id'=>$name,'class' => 'form-control','placeholder'=>$placeholder], $attributes)) }}
	@if ( $errors->has($name) )
		<span class="help-block">
			<strong>{{ $errors->first($name) }}</strong>
		</span>
	@endif
</div>
{{--
@push('scripts')
<script>
//$(function () {
	$.ajaxSetup({
    	headers: {
        	'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    	}
	});
	$('.dropzone').html5imageupload({
		onAfterProcessImage: function() {
			alert('onAfterProcessImage');
			var $val=$(this.element).data('name');
			$('#{{ $name }}').val($val);
		},
		onAfterCancel: function() {
			alert('onAfterCancel');
			$('#{{ $name }}').val('');
		}
	});
//});
</script>
@endpush	    
--}}