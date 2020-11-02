<?php

namespace Modules\Theme\Services;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

//----- Models -----

//---- xot extend -----
//----- services --

//---------CSS------------

class MenuService {
    public static function get() {
        $route_params = \Route::current()->parameters();
        extract($route_params);
        if (! isset($module)) {
            return [];
        }
        if (Str::startsWith($module, 'trasferte')) {
            $module_original = 'trasferte';
        } else {
            $module_original = $module;
        }
        $mod = \Module::find($module_original);
        $mod_path = $mod->getPath();
        $json_path = $mod_path.'/_menuxml/admin/'.$module.'/_menufull.php';
        //\Debugbar::addMessage($json_path, 'menu path:');
        $json_path = str_replace(['\\', '/'], [DIRECTORY_SEPARATOR, DIRECTORY_SEPARATOR], $json_path);
        if (! File::exists($json_path)) {
            return [];
        }
        $menu = include $json_path;

        return $menu;
    }
}
