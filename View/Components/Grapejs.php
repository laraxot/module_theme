<?php

declare(strict_types=1);

namespace Modules\Theme\View\Components;

use Illuminate\Contracts\Support\Renderable;
use Modules\Xot\View\Components\XotBaseComponent;

/**
 * Class Gallery.
 * nb: funziona in directorybs5 ma non in adminlte.
 */
<<<<<<< HEAD
class Grapejs extends XotBaseComponent {
    public function __construct() {
=======
class Grapejs extends XotBaseComponent
{
    public function __construct()
    {
>>>>>>> ede0df7 (first)
    }

    /**
     * Undocumented function.
     */
<<<<<<< HEAD
    public function render(): Renderable {
        /**
         * @phpstan-var view-string
         */
=======
    public function render(): Renderable
    {
>>>>>>> ede0df7 (first)
        $view = 'theme::components.grapejs';
        $view_params = [
            'view' => $view,
        ];

        return view()->make($view, $view_params);
    }
}
