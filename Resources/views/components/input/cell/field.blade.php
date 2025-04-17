<fieldset class="form-group container-fluid border p-2" {{-- $disabled --}} >
    <legend class="col-form-label col-sm-2 pt-0 w-auto"><h4>{{ $label }}</h4></legend>
	<div class="row">
    @if(isset($props) && is_iterable($props['fields']))
    @foreach($props['fields'] as $k=>$field)
        <x-theme::inputlw :props="$field" />
    @endforeach
    @else

    @endif
	</div>
</fieldset>
