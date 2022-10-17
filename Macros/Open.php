<?php

declare(strict_types=1);

namespace Modules\Theme\Macros;

<<<<<<< HEAD
// use Illuminate\Http\Request;
=======
//use Illuminate\Http\Request;
>>>>>>> ede0df7 (first)
use Collective\Html\FormFacade as Form;
use Illuminate\Support\Str;
use Modules\Xot\Services\PanelService;

/**
 * Class Open.
 */
<<<<<<< HEAD
class Open {
    /**
     * @return \Closure
     */
    public function __invoke() {
        return function ($model, $from, $to = '', $params = null, $formName = 'theForm') {
            if (null === $params) {
                // $params = optional(\Route::current())->parameters();
                $params = getRouteParameters();
            }
            $req_params = \Request::all();

            // if(is_array($req_params)) $params=array_merge($req_params,$params);

            // dd($params);

            if ('' === $to) {
                $to = $from;
                switch ($to) {
                    case 'update': $from = 'edit';
                        break;
                    case 'store': $from = 'create';
                        break;
=======
class Open
{
    /**
     * @return \Closure
     */
    public function __invoke()
    {
        return function ($model, $from, $to = '', $params = null, $formName = 'theForm') {
            if (null == $params) {
                $params = optional(\Route::current())->parameters();
            }
            $req_params = \Request::all();

            //if(is_array($req_params)) $params=array_merge($req_params,$params);

            //dd($params);

            if ('' == $to) {
                $to = $from;
                switch ($to) {
                case 'update': $from = 'edit';
                    break;
                case 'store': $from = 'create';
                    break;
>>>>>>> ede0df7 (first)
                }
            }
            /*
            $act = $to.'_url';
            try {
                $route = $model->$act;
            } catch (\Exception $e) {
                $route = '';
            }
            if ('' == $route) {
                $routename = \Request::route()->getName();
                $routename = str_replace('.'.$from, '.'.$to, $routename);
                $route = route($routename, array_merge($params, $req_params));
            }
            */
            $panel = PanelService::make()->get($model);
            $act = $to;
<<<<<<< HEAD
            // $func = Str::camel($to).'Url';

            // $url = $panel->$func();
            $url = $panel->url($act);

            switch ($to) {
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
            //$func = Str::camel($to).'Url';

            //$url = $panel->$func();
            $url = $panel->url($act);

            switch ($to) {
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

<<<<<<< HEAD
            // $parz=array_merge([$routename], array_values($params));
            return Form::model(
                $model,
                [
                    // 'route' => $parz,
                    'url' => $url,
                    'name' => $formName,
                    'id' => $formName,
                    // 'action' => $route
                ]
            )
            .method_field($method);
        }; // end function
    }

    // end invoke
}// end class
=======
            //$parz=array_merge([$routename], array_values($params));
            return Form::model(
                $model,
                [
                    //'route' => $parz,
                    'url' => $url,
                    'name' => $formName,
                    'id' => $formName,
                    //'action' => $route
                ]
            )
            .method_field($method);
        }; //end function
    }

    //end invoke
}//end class
>>>>>>> ede0df7 (first)
