@php
	$field=transFields(get_defined_vars());
	$name_conf=bracketsToDotted($name).'_confirmation';
	$name_conf=dottedToBrackets($name_conf);
@endphp
<div class="row">
<div class="col-sm-6">
	{{ Form::bsPassword($name) }}
</div>
<div class="col-sm-6">
	{{ Form::bsPassword($name_conf) }}
</div>
</div>