@php

    //https://www.javascripting.com/view/switchery
    //https://abpetkov.github.io/switchery/

    $field=transFields(get_defined_vars());
    //dddx($field);
    $field->attributes['class']=' form-control js-switch';
    Theme::add('theme::plugins/switchery/switchery.min.css');
    Theme::add('theme::plugins/switchery/switchery.min.js');
<<<<<<< HEAD

=======
    
>>>>>>> ede0df7 (first)
    //volevo inserire lo snippet qui dentro per non controllare l'esistenza di elems
    //nel caso questo field venisse chiamato più volte
    //Theme::add($comp_ns.'/switchery/index.js');
@endphp
@component($blade_component,get_defined_vars())
	@slot('label')
		{{ Form::label($name, $field->label , ['class' => 'control-label form-label']) }}
    @endslot

    @slot('input')
<<<<<<< HEAD
        {{--
            <input
            name="{{ $name }}"
            id="{{ $name }}"
            type="checkbox"
            class="js-switch"
            value="{{ $value }}"
=======
        {{-- 
            <input 
            name="{{ $name }}" 
            id="{{ $name }}" 
            type="checkbox" 
            class="js-switch" 
            value="{{ $value }}" 
>>>>>>> ede0df7 (first)
            {{ $value ? 'checked' : '' }}
            />
            --}}
        {{-- Form::bsHidden($name,0) --}}  {{-- se non selezionato restituisce 0 al posto di null --}}
<<<<<<< HEAD
        <input type="hidden" name="{{ $name }}" value="0">
=======
        <input type="hidden" name="{{ $name }}" value="0"> 
>>>>>>> ede0df7 (first)
        {{ Form::checkbox($name, 1,$value, $field->attributes) }}


	@endslot
@endcomponent

@push('scripts')
<script>
    if(!elems){
        var elems = Array.prototype.slice.call(document.querySelectorAll('.js-switch'));
        elems.forEach(function(html) {
            var switchery = new Switchery(html);
        });
    }
</script>
@endpush
