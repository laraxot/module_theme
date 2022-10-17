<?php

declare(strict_types=1);

namespace Modules\Theme\View\Components\Ribbon;

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
<<<<<<< HEAD
    public function __construct(?string $id = '') {
=======
    public function __construct(?string $id) {
>>>>>>> ede0df7 (first)
        $this->attrs['id'] = $id;
    }

    /**
     * Undocumented function.
     */
    public function render(): Renderable {
<<<<<<< HEAD
        /**
         * @phpstan-var view-string
         */
=======
>>>>>>> ede0df7 (first)
        $view = 'theme::components.ribbon.container';

        $view_params = [
            'view' => $view,
        ];

        return view()->make($view, $view_params);
    }
}
