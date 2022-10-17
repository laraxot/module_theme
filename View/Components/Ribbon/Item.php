<?php

declare(strict_types=1);

namespace Modules\Theme\View\Components\Ribbon;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\View\Component;

/**
 * Class Item.
 */
class Item extends Component {
    public array $attrs;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(?string $class = 'primary') {
        $this->attrs['class'] = $class;
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
        $view = 'theme::components.ribbon.item';

        $view_params = [
            'view' => $view,
        ];

        return view()->make($view, $view_params);
    }
}
