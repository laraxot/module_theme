<div class="bg-gray col-lg-8 col-xlg-9 col-md-7">
    <div class="form-group col-sm-12">
        <h2><a href="#" class="js-registered">@lang($view.'.prvPrivacy')</a></h2>
    </div>
    @for($i=0;$i<4;$i++)
        <div class="form-group col-sm-12">
            @php
                $k="cons_checkbox_".$i;
            @endphp
            {!! Form::bsPrvModal('linked['.$k.']') !!}
            {!! Form::hidden('linked['.$k.'_txt]',trans('food::privacy.'.$k)) !!}
        </div>
    @endfor
    <div class="form-group col-sm-12">
        @lang($view.'.mandatoryPrivacy')
    </div>
</div>