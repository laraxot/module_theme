<?php

declare(strict_types=1);

namespace Modules\Theme\Providers;

<<<<<<< HEAD
// --- bases ---
=======
//--- bases ---
>>>>>>> ede0df7 (first)
use Modules\Xot\Providers\XotBaseRouteServiceProvider;

/**
 * Class RouteServiceProvider.
 */
<<<<<<< HEAD
class RouteServiceProvider extends XotBaseRouteServiceProvider {
=======
class RouteServiceProvider extends XotBaseRouteServiceProvider
{
>>>>>>> ede0df7 (first)
    /**
     * The module namespace to assume when generating URLs to actions.
     */
    protected string $moduleNamespace = 'Modules\Theme\Http\Controllers';

    protected string $module_dir = __DIR__;

    protected string $module_ns = __NAMESPACE__;
}
