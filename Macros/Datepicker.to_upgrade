<?php

namespace Modules\FormX\Macros;

//use Illuminate\Http\Request;

//----- services -----

use Carbon\Carbon;

class Datepicker {
    public function __invoke() {
        return function ($label, $default = null, $params = []) {
            if (0 == count($params) || ! array_key_exists('class', $params)) {
                $params['class'] = '';
            }
            if (false === $default) {
                $default = '';
            }
            /*
            elseif (Input::old($label) !== NULL) {
                $default = Input::old($label);
            }
            */
            else {
                if ($default instanceof Carbon || $default instanceof DateTime) {
                    $default = $default->format('d/m/Y');
                } elseif (null == $default || 0 == $default) {
                    $default = Carbon::today()->format('d/m/Y');
                }
                if (null == $default || 0 == $default) {
                    $default = Carbon::today()->format('d/m/Y');
                }
            }
            $params['class'] .= ' date-picker';
            $input = '<div class="input-group"> ';
            $input .= '<input name="'.$label.'" id="'.$label.'" type="text" data-inputmask="\'alias\': \'date\'"  ';
            if (null !== $default && strlen((string) $default) > 0) {
                $input .= 'value="'.$default.'" ';
            }
            foreach ($params as $key => $value) {
                $input .= $key.'="'.$value.'" ';
            }
            $input .= '> ';
            $input .= '<span class="input-group-addon"><i class="mdi mdi-calendar-today"></i></span></div>';

            return $input;
        }; //end function
    }

    //end invoke
}//end class
