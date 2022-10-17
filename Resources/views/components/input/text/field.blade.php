@php
//var_dump($attrs);
<<<<<<< HEAD
=======

>>>>>>> ede0df7 (first)
@endphp

@if (isset($icon))
    <div class="input-label-absolute input-label-absolute-right">
        <div class="label-absolute"><i class="fa fa-search"></i></div>
        <input type="text" {{ $attributes->merge($attrs) }} />
    </div>
@else
<<<<<<< HEAD
    @php
        // per mettere la traduzione non so se va bene così
        //<label>{{ __($attrs['label']) }}</label>
    @endphp
=======
>>>>>>> ede0df7 (first)
    <input type="text" {{ $attributes->merge($attrs) }} />
@endif
