<?php

declare(strict_types=1);

namespace Modules\Theme\Macros;

/**
 * Class NavYear.
 */
class NavYear
{
    /**
     * @return \Closure
     */
    public function __invoke()
    {
        return function ($extra = []) {
            return 'NAV YEAR !!';
        }; // end return
    }

    // end invoke
}// end class
