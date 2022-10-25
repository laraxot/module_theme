<?php

declare(strict_types=1);

namespace Modules\Theme\View\Components\Nav\Tabs;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\View\Component;

/**
 * Container.
 */
class Container extends Component {
    /**
     * --.
     */
    public function __construct() {
    }

    /**
     * Get the view / contents that represents the component.
     */
    public function render(): Renderable {
        /**
         * @phpstan-var view-string
         */
        $view = 'theme::components.nav.tabs.container';
        $view_params = [
            'view' => $view,
        ];

        return view($view, $view_params);
    }
}
