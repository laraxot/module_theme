<link rel="stylesheet" href="{{ asset('/vendor/laravel-filemanager/css/lfm.css') }}">
<script src="{{asset('/vendor/laravel-filemanager/js/lfm.js')}}"></script>
{{ Form::label($name, trans('fields.'.$name), ['class' => 'col-md-1 control-label']) }}
<div class="col-md-5">
	<div class="input-group">
          <span class="input-group-btn">
            <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
              <i class="fa fa-picture-o"></i> Scegli immmagine
            </a>
          </span>
        <input id="thumbnail" class="form-control" type="text" name="{{$name}}" value="{{$value}}">
	</div>
	<img id="holder" style="margin-top:15px;max-height:100px;">
    @if ( $errors->has($name) )
        <span class="help-block">
				<strong style="color:red">{{ $errors->first($name) }}</strong>
			</span>
    @endif
</div>

<script type="text/javascript">
    $('document').ready(function(){
        $('#lfm').filemanager('image'); //
    });
</script>