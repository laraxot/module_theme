<?php

declare(strict_types=1);

namespace Modules\Theme\Macros;

// use Illuminate\Http\Request;

use Collective\Html\FormFacade as Form;

// ----- services -----

/**
 * Class BtnCrud.
 */
class BtnCrud {
    /**
     * @return \Closure
     */
    public function __invoke() {
        return function ($extra, array $params = []) {
            extract($params);

            $btns = '<div class="btn-group btn-group-sm" role="group" aria-label="Actions">';

            if (empty($params) || isset($edit)) {
                $btns .= Form::bsBtnEdit($extra);
            }
            if (empty($params) || isset($delete)) {
                $btns .= Form::bsBtnDelete($extra);
            }
            if (empty($params) || isset($detach)) {
                $btns .= Form::bsBtnDetach($extra);
            }
            if (empty($params) || isset($show)) {
                $btns .= Form::bsBtnShow($extra);
            }
            // $btns.=Form::bsBtnClone($extra);
            $btns .= '</div>';

            return $btns;
        }; // end function
    }

    // end invoke
}// end class
