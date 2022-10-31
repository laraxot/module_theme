<?php

declare(strict_types=1);

namespace Modules\Theme\Macros;

// use Illuminate\Http\Request;

use Collective\Html\FormFacade as Form;

// ----- services -----

// --- azioni container

/**
 * Class BtnCreateAttach.
 */
class BtnCreateAttach
{
    /**
     * @return \Closure
     */
    public function __invoke()
    {
        return function ($extra) {
            $btns = '';
            $btns .= Form::bsBtnCreate($extra);
            // $btns.=Form::bsBtnIndexAttach($extra); //per adesso crea solo confusione
            return $btns;
        }; // end function
    }

    // end invoke
}// end class
