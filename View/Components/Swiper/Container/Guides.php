<?php

declare(strict_types=1);

namespace Modules\Theme\View\Components\Swiper\Container;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\View\Component;

/**
 * Class Guides.
 */
class Guides extends Component {
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct() {
    }

    /**
     * Undocumented function.
     */
    public function render(): Renderable {
        $view = 'theme::components.swiper.container.guides';

        $view_params = [
            'view' => $view,
        ];

        return view()->make($view, $view_params);
    }
}