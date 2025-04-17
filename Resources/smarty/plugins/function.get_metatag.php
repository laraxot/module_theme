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
 *
 * @return \Illuminate\Config\Repository|\Illuminate\Contracts\Foundation\Application|mixed
 */
function smarty_function_get_metatag($params, $smarty)
{
    return ThemeService::metatag($params['name']);
}
