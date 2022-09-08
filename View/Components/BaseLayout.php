<?php

declare(strict_types=1);

namespace Modules\Theme\View\Components;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\View\Component;

class BaseLayout extends Component {
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct() {
    }

    public function render(): Renderable {
        /**
         * @phpstan-var view-string
         */
        $view = 'pub_theme::components.layouts.base';
        $view_params = ['view' => $view];

        return view()->make($view, $view_params);
    }
}
