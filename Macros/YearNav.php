<?php

declare(strict_types=1);

namespace Modules\Theme\Macros;

/**
 * Class YearNav.
 */
<<<<<<< HEAD
class YearNav {
    /**
     * @return \Closure
     */
    public function __invoke() {
        return function ($paramz) {
            /**
             * @var string
             */
            $routename = optional(\Route::currentRouteName());
            extract($paramz);
            // $params = optional(\Route::current())->parameters();
            $params = getRouteParameters();
=======
class YearNav
{
    /**
     * @return \Closure
     */
    public function __invoke()
    {
        return function ($paramz) {
            $routename = optional(\Route::currentRouteName());
            extract($paramz);
            $params = optional(\Route::current())->parameters();
>>>>>>> ede0df7 (first)
            if (isset($params['anno'])) {
                $anno = $params['anno'];
            } else {
                $anno = date('Y');
            }
<<<<<<< HEAD
            // $time = mktime(0, 0, 0, 1, 1, $anno);
=======
            //$time = mktime(0, 0, 0, 1, 1, $anno);
>>>>>>> ede0df7 (first)
            $time_prev = mktime(0, 0, 0, 1, 1, (int) $anno - 1);
            $time_next = mktime(0, 0, 0, 1, 1, (int) $anno + 1);
            if (! $time_next || ! $time_prev) {
                throw new \Exception('$time_next is false');
            }
            $parz = $params;
            $parz['anno'] = $anno;

            $route_curr = route($routename, $parz);
            $parz['anno'] = date('Y', $time_prev);
            $route_prev = route($routename, $parz);
            $parz['anno'] = date('Y', $time_next);
            $route_next = route($routename, $parz);

            $html = '<nav aria-label="year_nav">
			<ul class="pager pagination justify-content-center">
			<li class="previous page-item"><a class="page-link" href="'.$route_prev.'">&laquo;'.($anno - 1).'</a></li>
<<<<<<< HEAD
			<li class="current page-item active"><a class="page-link" href="'.$route_curr.'">'.$anno.' </a></li>
=======
			<li class="current page-item active"><a class="page-link" href="'.$route_curr.'">'.($anno).' </a></li>
>>>>>>> ede0df7 (first)
			<li class="next page-item"><a class="page-link" href="'.$route_next.'">'.($anno + 1).' &raquo; </a></li>
			</ul>
			</nav>';

            return $html;
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
