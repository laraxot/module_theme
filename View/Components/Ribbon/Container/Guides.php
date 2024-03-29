<?php

declare(strict_types=1);

namespace Modules\Theme\View\Components\Ribbon\Container;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\View\Component;

/**
 * Class Guides.
 */
class Guides extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Undocumented function.
     */
    public function render(): Renderable
    {
        /**
         * @phpstan-var view-string
         */
        $view = 'theme::components.ribbon.container.guides';

        $view_params = [
            'view' => $view,
        ];

        return view()->make($view, $view_params);
    }
}
