@php
/*
    visualizza un calendario con evidenziati i giorni elencati
    da utilizzare nel caso si abbia, nel db, un campo stringa che elenca una serie di date
    esempio: 18/8/2004,19/6/2004,19/8/2004,25/8/2004,26/8/2004,28/7/2004,29/7/2004,30/7/2004

<<<<<<< HEAD
<<<<<<< HEAD
    (object)
[
=======
    (object) [
>>>>>>> b6141c95 (first)
=======
    (object) [
>>>>>>> 6aa89a58 (first)
        'type' => 'DateList',
        'name' => 'listadata',
        'comment' => null,
        'col_size' => 6,
    ],
*/

$field = transFields(get_defined_vars());
//dddx([get_defined_vars(),$field]);
$date_list = $_panel->getRow()->{$name};
//dddx([$_panel, $_panel->getRow(), $_panel->getRow()->{$name}, $_panel->row]);
if (is_null($date_list)) {
    $date_list = '';
}
@endphp
<<<<<<< HEAD
<<<<<<< HEAD
{{-- <livewire:calendar.stringlist  :date_list="$date_list" /> --}}
=======
{{-- <livewire:theme::calendar.stringlist  :date_list="$date_list" /> --}}
>>>>>>> b6141c95 (first)
=======
{{-- <livewire:theme::calendar.stringlist  :date_list="$date_list" /> --}}
>>>>>>> 6aa89a58 (first)



@component($blade_component, get_defined_vars())
    @slot('label')
        {{ Form::label($name, $field->label, ['class' => 'control-label form-label']) }}
    @endslot
    @slot('input')
        @livewire('theme::calendar.stringlist',['date_list'=>$date_list, 'input_name' => $name])
    @endslot
@endcomponent
