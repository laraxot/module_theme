@php
//echo '<pre>';print_r($value);echo '</pre>';
@endphp
<ul>
@foreach($options as $k => $opt)
@php
	$check=in_array($opt->id,$value);
@endphp
<br/>
<li>{{ Form::checkbox($name.'[]', $opt->id,$check) }} {{ $opt->nome }}</li>
@endforeach
</ul>