<?php

declare(strict_types=1);

namespace Modules\Theme\Macros;

<<<<<<< HEAD
// use Illuminate\Http\Request;
use Exception;
// ----- services -----
use Illuminate\Support\Str;
=======
use Illuminate\Support\Facades\Request;
//use Illuminate\Http\Request;
use Illuminate\Support\Str;
//----- services -----
>>>>>>> ede0df7 (first)
use Modules\Xot\Services\PanelService;
use Modules\Xot\Services\StubService;

/**
 * Class BaseFormBtnMacro.
 */
<<<<<<< HEAD
abstract class BaseFormBtnMacro {
    /**
     * @return array|void
     */
    public static function before(array $params) {
        $generate_btn = 1;
        $user = \Auth::user();
        if (null === $user) {
            return ['error' => 1, 'error_msg' => '[Not Logged]'];
        }
        $class = static::class;
        $class_name = class_basename($class); // BtnDetach
        $btn = Str::after($class_name, 'Btn');
        if ('Delete' === $btn) {
=======
abstract class BaseFormBtnMacro
{
    /**
     * @return array|void
     */
    public static function before(array $params)
    {
        $generate_btn = 1;
        $user = \Auth::user();
        if (null == $user) {
            return ['error' => 1, 'error_msg' => '[Not Logged]'];
        }
        $class = get_called_class();
        $class_name = class_basename($class); //BtnDetach
        $btn = Str::after($class_name, 'Btn');
        if ('Delete' == $btn) {
>>>>>>> ede0df7 (first)
            $btn = 'Destroy';
        }
        $act = Str::camel($btn);
        extract($params);
        if (! isset($row)) {
            dddx(['err' => 'row is missing']);

            return;
        }
<<<<<<< HEAD
        if (! $user->can($act, $row) && ! \in_array($act, ['gear'], true)) {
            $policy = StubService::make()->setModelAndName($row, 'policy')->get();
            $error_msg = '[not can '.$act.']['.$policy.']';
            // dddx(App::environment('local'));
            if ('local' === env('APP_ENV')) {
=======
        if (! $user->can($act, $row) && ! in_array($act, ['gear'])) {
            $policy = StubService::make()->setModelAndName($row, 'policy')->get();
            $error_msg = '[not can '.$act.']['.$policy.']';
            //dddx(App::environment('local'));
            if ('local' == env('APP_ENV')) {
>>>>>>> ede0df7 (first)
                return ['error' => 1, 'error_msg' => $error_msg];
            } else {
                return ['error' => 1, 'error_msg' => ''];
            }
        }
<<<<<<< HEAD
        if (! isset($row->pivot) && 'detach' === $act) {
=======
        if (! isset($row->pivot) && 'detach' == $act) {
>>>>>>> ede0df7 (first)
            return ['error' => 1, 'error_msg' => '[Not Pivot]'];
        }
        $act_route = Str::snake($act);

        $route_action = optional(\Route::currentRouteAction());
        $old_act = '';
<<<<<<< HEAD
        /* --- le macro le stiamo sostituendo con i blade component
        if (null !== \Route::currentRouteAction()  && null !== \Route::currentRouteAction()->value) {
            if (! is_string($route_action)) {
                throw new Exception('['.__LINE__.']['.class_basename(__CLASS__).']');
            }
            $old_act = Str::snake(Str::after($route_action, '@'));
        }
        */
        $routename = getRouteName();
        $old_act_route = last(explode('.', (string) $routename));
=======
        if (! is_null(optional(\Route::currentRouteAction())->value)) {
            $old_act = Str::snake(Str::after($route_action, '@'));
        }
        $routename = optional(Request::route())->getName();
        $old_act_route = last(explode('.', $routename));
>>>>>>> ede0df7 (first)

        if (! isset($panel)) {
            $panel = PanelService::make()->get($row);
        }

<<<<<<< HEAD
=======
        /*PROVA SE COSI TI TROVI MEGLIO,
        PERCHE SU FRONTEND SE SEI SU UNA REGIONE E VUOI MODIFICARE UNA SOTTO PROVINCIA
        NON TE LO FA CON IL METODO CORRENTE */

>>>>>>> ede0df7 (first)
        $route_params = getRouteParameters();

        $route = '';

        /* if (true === array_key_exists('container2', $route_params)) {
         } elseif (true === array_key_exists('container1', $route_params)) {
             //dddx();
             $route = route('containers.'.$act, array_merge($route_params, ['item1' => $row->{$row->getRouteKeyName()}]));
         } elseif (true === array_key_exists('container0', $route_params)) {
             //dddx(route('containers.'.$act, array_merge($route_params, ['item0' => $row->{$row->getRouteKeyName()}])));
             $route = route('containers.'.$act, array_merge($route_params, ['item0' => $row->{$row->getRouteKeyName()}]));
         } else {
             throw new \Exception('Invalid route');
         }*/

        $route_name = [];

        $count = 0;
        foreach ($route_params as $key => $value) {
            if (strpos($key, 'item') > -1) {
                ++$count;
            } else {
<<<<<<< HEAD
                $route_name[] = $key;
            }
        }

        // dddx([join('.', array_keys($route_params)).'.'.$act, array_merge($route_params, ['item'.$count => $row->{$row->getRouteKeyName()}])]);

        unset($route_name[0]);

        // dddx($route_name);

        $route = route(
            implode('.', array_values($route_name)).'.'.$act,
            array_merge($route_params, ['item'.$count => $row->{$row->getRouteKeyName()}])
        );

        // dddx([get_defined_vars(), $routename]); // route($routename.$act, array_merge($route_params, ['item1' => $row->{$row->getRouteKeyName()}]))]);

        // dddx($route);

        // $route = $panel->url($act);

        // dddx($route);
=======
                array_push($route_name, $key);
            }
        }

        //dddx([join('.', array_keys($route_params)).'.'.$act, array_merge($route_params, ['item'.$count => $row->{$row->getRouteKeyName()}])]);

        unset($route_name[0]);

        //dddx($route_name);

        $route = route(
            join('.', array_values($route_name)).'.'.$act,
            array_merge($route_params, ['item'.$count => $row->{$row->getRouteKeyName()}])
        );

        //dddx([get_defined_vars(), $routename]); // route($routename.$act, array_merge($route_params, ['item1' => $row->{$row->getRouteKeyName()}]))]);

        //dddx($route);

        //$route = $panel->url($act);

        //dddx($route);
>>>>>>> ede0df7 (first)

        $view_comp_dir = 'theme::includes.components.btn';
        $view_comp = $view_comp_dir.'.'.$act_route;
        $data = [
            'error' => 0,
            'error_msg' => 'no errors',
            'user' => $user,
            'class_name' => $class_name,
            'btn' => $btn,
            'act' => $act,
            'act_route' => $act_route,
            'old_act' => $old_act,
            'old_act_route' => $old_act_route,
            'row' => $row,
            'id' => 2,
<<<<<<< HEAD
            // 'routename_act' => $routename_act,
=======
            //'routename_act' => $routename_act,
>>>>>>> ede0df7 (first)
            'route' => $route,
            'btn_class' => 'btn btn-small btn-info',
            'view_comp' => $view_comp,
            'view_comp_dir' => $view_comp_dir,
        ];
<<<<<<< HEAD
        // dddx($generate_btn);
        // if ($generate_btn) {
        $data['btn'] = view()->make($view_comp, $data);
        // }
=======
        //dddx($generate_btn);
        //if ($generate_btn) {
        $data['btn'] = view()->make($view_comp, $data);
        //}
>>>>>>> ede0df7 (first)

        return $data;
    }
}
