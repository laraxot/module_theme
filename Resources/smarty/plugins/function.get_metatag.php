<?php

declare(strict_types=1);
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

/**
 * @param array $params
 * @param mixed $smarty
 *
 * @return \Illuminate\Config\Repository|\Illuminate\Contracts\Foundation\Application|mixed
 */
<<<<<<< HEAD
function smarty_function_get_metatag($params, $smarty) {
=======
function smarty_function_get_metatag($params, $smarty)
{
>>>>>>> ede0df7 (first)
    return ThemeService::metatag($params['name']);
}
