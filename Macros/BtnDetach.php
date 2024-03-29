<?php

declare(strict_types=1);

namespace Modules\Theme\Macros;

/**
 * Class BtnDetach.  maybe to component.
 */
class BtnDetach extends BaseFormBtnMacro
{
    /**
     * @return \Closure
     */
    public function __invoke()
    {
        return function ($extra) {
            $class = __CLASS__;
            $vars = $class::before($extra);
            if (! \is_array($vars)) {
                throw new \Exception('vars is not an array');
            }
            if ($vars['error']) {
                return '';
            }// $vars['error_msg'];

            return $vars['btn'];
        }; // end function
    }

    // end invoke
}// end class
