<?php

declare(strict_types=1);

namespace Modules\Theme\View\Components;

use Illuminate\Contracts\Support\Renderable;
use Modules\Xot\View\Components\XotBaseComponent;

/**
 * Class Gallery.
 * nb: funziona in directorybs5 ma non in adminlte.
 */
class Grapejs extends XotBaseComponent {
    public function __construct() {
    }

    /**
     * Undocumented function.
     */
    public function render(): Renderable {
        $view = 'theme::components.grapejs';
        $view_params = [
            'view' => $view,
        ];

        return view()->make($view, $view_params);
    }
}
