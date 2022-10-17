<?php

declare(strict_types=1);

namespace Modules\Theme\Macros;

use Collective\Html\FormFacade as Form;
use Illuminate\Support\Str;

/**
 * Class OpenPanel.
 */
<<<<<<< HEAD
class OpenPanel {
    /**
     * @return \Closure
     */
    public function __invoke() {
        return function ($panel, $act = '', $params = []) {
            // $route_params = optional(\Route::current())->parameters();
            $route_params = getRouteParameters();
            $req_params = \Request::all();

            switch ($act) {
                case 'store':
                    $method = 'POST';
                    break;
                case 'update':
                    $method = 'PUT'; // PUT/PATCH
                    break;
                case 'destroy':
                    $method = 'DELETE';
                    break;
                default:
                    $method = 'POST';
                    break;
=======
class OpenPanel
{
    /**
     * @return \Closure
     */
    public function __invoke()
    {
        return function ($panel, $act = '', $params = []) {
            $route_params = optional(\Route::current())->parameters();
            $req_params = \Request::all();

            switch ($act) {
            case 'store':
                $method = 'POST';
                break;
            case 'update':
                $method = 'PUT'; //PUT/PATCH
                break;
            case 'destroy':
                $method = 'DELETE';
                break;
            default:
                $method = 'POST';
                break;
>>>>>>> ede0df7 (first)
            }
            if (isset($params['method'])) {
                $method = $params['method'];
            }
            $form_name = 'form_'.$act;
            if (isset($params['form_name'])) {
                $form_name = $params['form_name'];
            }
<<<<<<< HEAD
            // $func = Str::camel($act).'Url';

            // $url = $panel->$func();
=======
            //$func = Str::camel($act).'Url';

            //$url = $panel->$func();
>>>>>>> ede0df7 (first)
            $url = $panel->url($act);

            return Form::model(
                $panel->getRow(),
                [
                    'url' => $url,
                    'name' => $form_name,
                    'id' => $form_name,
                ]
            )
            .method_field($method);
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
