<?php

declare(strict_types=1);

namespace Modules\Theme\Macros;

<<<<<<< HEAD
// use Illuminate\Http\Request;

use Collective\Html\FormFacade as Form;

// ----- services -----

// --- azioni container
=======
//use Illuminate\Http\Request;

use Collective\Html\FormFacade as Form;

//----- services -----

//--- azioni container
>>>>>>> ede0df7 (first)

/**
 * Class BtnCreateAttach.
 */
<<<<<<< HEAD
class BtnCreateAttach {
    /**
     * @return \Closure
     */
    public function __invoke() {
        return function ($extra) {
            $btns = '';
            $btns .= Form::bsBtnCreate($extra);
            // $btns.=Form::bsBtnIndexAttach($extra); //per adesso crea solo confusione
            return $btns;
        }; // end function
    }

    // end invoke
}// end class
=======
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
            //$btns.=Form::bsBtnIndexAttach($extra); //per adesso crea solo confusione
            return $btns;
        }; //end function
    }

    //end invoke
}//end class
>>>>>>> ede0df7 (first)
