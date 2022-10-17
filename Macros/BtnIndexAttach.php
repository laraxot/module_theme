<?php

declare(strict_types=1);

namespace Modules\Theme\Macros;

use Exception;

/**
 * Class BtnIndexAttach.
 */
<<<<<<< HEAD
class BtnIndexAttach extends BaseFormBtnMacro {
    /**
     * @return \Closure
     */
    public function __invoke() {
        return function ($extra) {
            $class = __CLASS__;
            $vars = $class::before($extra);
            if (! \is_array($vars)) {
                throw new Exception('vars is not an array');
=======
class BtnIndexAttach extends BaseFormBtnMacro
{
    /**
     * @return \Closure
     */
    public function __invoke()
    {
        return function ($extra) {
            $class = __CLASS__;
            $vars = $class::before($extra);
            if(!is_array($vars)) {
                throw new Exception("vars is not an array");
>>>>>>> ede0df7 (first)
            }
            if ($vars['error']) {
                return $vars['error_msg'];
            }

            return $vars['btn'];
<<<<<<< HEAD
        }; // end function
    }

    // end invoke
}// end class
=======
        }; //end function
    }

    //end invoke
}//end class
>>>>>>> ede0df7 (first)
