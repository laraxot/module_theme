<?php

declare(strict_types=1);

namespace Modules\Theme\Macros;

use Illuminate\Support\Facades\Request;
// use Illuminate\Http\Request;
use Illuminate\Support\Str;
// ----- services -----
use Modules\Xot\Services\PanelService;
use Modules\Xot\Services\StubService;

/**
 * Class BaseFormBtnMacro.
 */
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
            $btn = 'Destroy';
        }
        $act = Str::camel($btn);
        extract($params);
        if (! isset($row)) {
            dddx(['err' => 'row is missing']);

            return;
        }
        if (! $user->can($act, $row) && ! \in_array($act, ['gear'], true)) {
            $policy = StubService::make()->setModelAndName($row, 'policy')->get();
            $error_msg = '[not can '.$act.']['.$policy.']';
            // dddx(App::environment('local'));
            if ('local' === env('APP_ENV')) {
                return ['error' => 1, 'error_msg' => $error_msg];
            } else {
                return ['error' => 1, 'error_msg' => ''];
            }
        }
        if (! isset($row->pivot) && 'detach' === $act) {
            return ['error' => 1, 'error_msg' => '[Not Pivot]'];
        }
        $act_route = Str::snake($act);

        $route_action = optional(\Route::currentRouteAction());
        $old_act = '';
        if (null !== \Route::currentRouteAction()->value) {
            $old_act = Str::snake(Str::after($route_action, '@'));
        }
        $routename = optional(Request::route())->getName();
        $old_act_route = last(explode('.', $routename));

        if (! isset($panel)) {
            $panel = PanelService::make()->get($row);
        }

        /*PROVA SE COSI TI TROVI MEGLIO,
        PERCHE SU FRONTEND SE SEI SU UNA REGIONE E VUOI MODIFICARE UNA SOTTO PROVINCIA
        NON TE LO FA CON IL METODO CORRENTE */

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
            // 'routename_act' => $routename_act,
            'route' => $route,
            'btn_class' => 'btn btn-small btn-info',
            'view_comp' => $view_comp,
            'view_comp_dir' => $view_comp_dir,
        ];
        // dddx($generate_btn);
        // if ($generate_btn) {
        $data['btn'] = view()->make($view_comp, $data);
        // }

        return $data;
    }
}