<?php

declare(strict_types=1);

namespace Modules\Theme\View\Components\Ribbon\V2;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\View\Component;

/**
 * Class Container.
 */
class Container extends Component {
    public array $attrs;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(?string $class = null) {
        $this->attrs['class'] = $class ?? 'card bg-gray-100 w-100 position-relative py-6 border-0 shadow';
    }

    /**
     * Undocumented function.
     */
    public function render(): Renderable {
        /**
         * @phpstan-var view-string
         */
        $view = 'theme::components.ribbon.v2.container';

        $view_params = [
            'view' => $view,
        ];

        return view()->make($view, $view_params);
    }
}
