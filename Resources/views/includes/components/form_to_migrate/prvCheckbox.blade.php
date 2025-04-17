@php
    $trans='food::privacy.'; //caso particolare
    $name1=$name;
    $name1=str_replace('linked[','',$name1);
    $name1=str_replace(']','',$name1);
    $name1=str_replace('linked.','',$name1);
    // Va localizzato
    $name1Descr = 'linked['.$name1."Descr]";

    if(isset($attributes['label']))
        $label=$attributes['label'];
    else
        $label=trans($trans.$name1);
    $txt=trans($trans.$name1.'_txt');
    $title=trans($trans.$name1.'_title');
@endphp
<div class="form-group{{ $errors->has($name) ? ' has-error' : '' }}">
    <h4>{{$title}}</h4>
    <br style="clear:both"/>
    {{ Form::hidden($name1Descr,$label) }}
    {{ Form::textarea(null,$txt,['readonly','class'=>'form-control'] ) }}<br>
    {{ Form::checkbox($name, 1,$value ,['class'=>'form-control icheck']) }}  {{-- il checkbox non passa valore se non selezionato, si potrebbe fare con js. ma il componente deve funzionare anche senza js --}}
    {{ Form::label($name1,   trans($trans.$name1)) }}
    @if(isset($attributes['required'])) *
    @endif
    @if ( $errors->has($name) )
        <span class="help-block">
			<strong>{{ $errors->first($name) }}</strong>
		</span>
    @endif
</div>