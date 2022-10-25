<?php

declare(strict_types=1);

namespace Modules\Theme\View\Components;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\View\Component;

/**
 * Undocumented class.
 */
class Disclaimer extends Component {
    public function __construct() {
    }

    public function render(): Renderable {
        /**
         * @phpstan-var view-string
         */
        $view = 'theme::components.disclaimer.default';
        $view_params = ['view' => $view];

        return view()->make($view, $view_params);
    }
}
