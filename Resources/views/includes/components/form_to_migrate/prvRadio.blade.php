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
@endphp
<div class="form-group{{ $errors->has($name) ? ' has-error' : '' }}">
    <h4>{{$title}}</h4>
    <br style="clear:both"/>
    {{ Form::textarea(null,$txt,['readonly','class'=>'form-control'] ) }}<br>
    {{ Form::hidden($name1Descr,$label) }}
    {{ Form::radio($name, 1 ) }}Do il consenso / Autorizzo<br>
    {{ Form::radio($name, 0 ) }}Non do il consenso / Non Autorizzo<br>
    @if(isset($attributes['required'])) *
    @endif
    @if ( $errors->has($name) )
        <span class="help-block">
			<strong>{{ $errors->first($name) }}</strong>
		</span>
    @endif
</div>