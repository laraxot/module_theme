<?php

declare(strict_types=1);

namespace Modules\Theme\View\Components\Lists;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\View\Component;

/**
 * Class Container.
 */
class Container extends Component {
    public ?string $ul_class;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(?string $ul_class = '') {
        $this->ul_class = $ul_class;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): Renderable {
        $view = 'theme::components.lists.container';

        $view_params = [
            'view' => $view,
        ];

        return view()->make($view, $view_params);
    }
}
