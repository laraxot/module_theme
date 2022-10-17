<?php

declare(strict_types=1);

namespace Modules\Theme\Macros;

/**
 * Class FormSearchAddress.
 */
<<<<<<< HEAD
class FormSearchAddress {
    /**
     * @return \Closure
     */
    public function __invoke() {
=======
class FormSearchAddress
{
    /**
     * @return \Closure
     */
    public function __invoke()
    {
>>>>>>> ede0df7 (first)
        return function (array $params = []) {
            $view_comp_dir = 'theme::includes.components.form_complete.search.address';

            return view()->make($view_comp_dir)->with($params);
<<<<<<< HEAD
        }; // end return
    }

    // end invoke
}// end class
=======
        }; //end return
    }

    //end invoke
}//end class
>>>>>>> ede0df7 (first)
