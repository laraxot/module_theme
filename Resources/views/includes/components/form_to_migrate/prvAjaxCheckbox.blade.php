@php
    $view.'.field.'='food::privacy'; //caso particolare
    $name1=$name;
    $name1=str_replace('linked[','',$name1);
    $name1=str_replace(']','',$name1);

    // Va localizzato
    $name1Descr = 'linked['.$name1."Descr]";

    if(isset($attributes['label']))
        $label=$attributes['label'];
    else
        $label=trans($view.'.field.'.$name1);
    $txt=trans($view.'.field.'.$name1.'_txt');
    $title=trans($view.'.field.'.$name1.'_title');

    $idx = $attributes["index"];
@endphp
<div class="form-group{{ $errors->has($name) ? ' has-error' : '' }}">
    <div class="checkbox">
        <label>
            <a href="#" data-toggle="modal"
               data-target="#privacy_modal_{{ $idx }}">@lang('food::privacy.'.$name1.'_title')</a>
            <br><input type="checkbox" name="{{$name}}">@lang('pub_theme::txt.accept')
        </label>
    </div>
    {{ Form::hidden($name1Descr,$label) }}
    @if(isset($attributes['required'])) *
    @endif
    @if ( $errors->has($name) )
        <span class="help-block">
			<strong>{{ $errors->first($name) }}</strong>
		</span>
    @endif
</div>