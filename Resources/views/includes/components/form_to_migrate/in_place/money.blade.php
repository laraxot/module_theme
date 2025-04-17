@php
    $value=Form::getValueAttribute($name);
    $model=Form::getModel();
    $alertError = trans($view.'.field.'.$name.'_alert');
    Theme::add('theme::js/edit_in_place.js');
    Theme::add('/theme/bc/sweetalert2/dist/sweetalert2.css');
    Theme::add('/theme/bc/sweetalert2/dist/sweetalert2.min.js');
@endphp
<p class="editinplace col-lg-8" style="float:left;" data-url="{{ $model->update_url }}" data-field="{{ $name }}" data-prev-value="" data-null-error="{{ $alertError }}">{{ number_format($value, 2, ',', "'") }}</p>
