@php
//dddx($related);
//dddx($pivot_fields);
@endphp

<fieldset>
    <legend>
        {{-- <b>@lang($trad.'.'.$name.'.title')</b> --}}

    </legend>
    <div class="row">
        <div class="col-md-12">
            @php
                $avg = $rows->avg('pivot.rating');
                $count = $rows->count('pivot.rating');
                $pf = (object) [
                    'type' => 'rating',
                    'name' => '',
                    'txt' => $count,
                ];
            @endphp
            {!! Theme::inputFreeze([
    'row' => $row,
    'value' => $avg,
    //'label'=>$v->title,
    'field' => $pf,
]) !!}
        </div>
    </div>

</fieldset>
