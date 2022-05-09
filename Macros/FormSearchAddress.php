<?php

declare(strict_types=1);

namespace Modules\Theme\Macros;

/**
 * Class FormSearchAddress.
 */
class FormSearchAddress
{
    /**
     * @return \Closure
     */
    public function __invoke()
    {
        return function (array $params = []) {
            $view_comp_dir = 'theme::includes.components.form_complete.search.address';

            return view()->make($view_comp_dir)->with($params);
        }; //end return
    }

    //end invoke
}//end class
