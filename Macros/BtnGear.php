<?php

declare(strict_types=1);

namespace Modules\Theme\Macros;

use Exception;
use Illuminate\Contracts\View\View as ViewContract;
<<<<<<< HEAD
use Illuminate\Support\Str;
use Illuminate\View\View;

/**
 * Class BtnGear.
 */
class BtnGear extends BaseFormBtnMacro {
    /**
     * @return \Closure
     */
    public function __invoke() {
=======
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Str;
use Illuminate\View\View;



/**
 * Class BtnGear.
 */
class BtnGear extends BaseFormBtnMacro
{
    /**
     * @return \Closure
     */
    public function __invoke()
    {
>>>>>>> ede0df7 (first)
        return function ($extra): ViewContract {
            $class = __CLASS__;
            $extra['generate_btn'] = 0;
            $vars = $class::before($extra);

<<<<<<< HEAD
            if (! \is_array($vars)) {
                throw new Exception('vars is not an array');
=======
            if(!is_array($vars)) {
                throw new Exception("vars is not an array");
>>>>>>> ede0df7 (first)
            }

            if ($vars['error']) {
                return $vars['error_msg'];
            }
<<<<<<< HEAD
            // $routename =getRouteName();
            $routename = getRouteName();
            $routetmp = Str::before((string) $routename, $vars['old_act_route']);
            $act = 'no-set';
            switch ($vars['old_act_route']) {
                case 'index':
                    $act = 'index_edit';
                    break;
                case 'index_edit':
                    $act = 'index';
                    break;
                case 'show':
                    $act = 'edit';
                    break;
                case 'edit':
                    $act = 'show';
                    break;
            }
            $routename_gear = $routetmp.$act;
            // $route_params = optional(\Route::current())->parameters();
            $route_params = getRouteParameters();
=======
            $routename = optional(Request::route())->getName();
            $routetmp = Str::before($routename, $vars['old_act_route']);
            $act = 'no-set';
            switch ($vars['old_act_route']) {
            case 'index':
                $act = 'index_edit';
                break;
            case 'index_edit':
                $act = 'index';
                break;
            case 'show':
                $act = 'edit';
                break;
            case 'edit':
                $act = 'show';
                break;
            }
            $routename_gear = $routetmp.$act;
            $route_params = optional(\Route::current())->parameters();
>>>>>>> ede0df7 (first)
            try {
                $route_gear = route($routename_gear, $route_params);
            } catch (\Exception $e) {
                $route_gear = '#';
            }
            $func = Str::camel($act);
            $row = $extra['row'];
            $btns = [];
            $user = \Auth::user();
<<<<<<< HEAD
            if (null === $user) {
=======
            if (null == $user) {
>>>>>>> ede0df7 (first)
                throw new \Exception('$user is null');
            }
            if ($user->can($func, $row)) {
                $tmp = [];
                $tmp['title'] = $act;
                $tmp['url'] = $route_gear;
                $tmp['icon'] = 'far fa-edit';
                $tmp['modal'] = 0;
                $btns[] = (object) $tmp;
            }
<<<<<<< HEAD
            // if (true) {
=======
            //if (true) {
>>>>>>> ede0df7 (first)
            $tmp = [];
            $tmp['title'] = 'Gestisti Traduzioni';
            $tmp['url'] = route('containers.index', ['container0' => 'translation', 'uri' => req_uri(), 'lang' => app()->getLocale()]);
            $tmp['icon'] = 'fas fa-language fa-2x';
            $tmp['modal'] = 1;
            $btns[] = (object) $tmp;
<<<<<<< HEAD
            // }
=======
            //}
>>>>>>> ede0df7 (first)
            $vars['btns'] = $btns;
            if (! isset($vars['view_comp'])) {
                dddx(['err' => 'view_comp is missing']);
                $vars['view_comp'] = '';
            }

<<<<<<< HEAD
            // return view($vars['view_comp'], $vars);
            return view()->make($vars['view_comp'], $vars);
        }; // end function
    }

    // end invoke
}// end class
=======
            //return view($vars['view_comp'], $vars);
            return view()->make($vars['view_comp'], $vars);
        }; //end function
    }

    //end invoke
}//end class
>>>>>>> ede0df7 (first)
