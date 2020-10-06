<?php
/*
 * Smarty plugin
 * -------------------------------------------------------------
 * File:     function.get_metatag.php
 * Type:     function
 * Name:     get_metatag
 * Purpose:  get metatag
 * -------------------------------------------------------------
 * https://www.smarty.net/best_practices
 */
use Modules\Theme\Services\ThemeService;

function smarty_function_get_metatag($params, $smarty) {
    return ThemeService::metatag($params['name']);
}
