<?php

declare(strict_types=1);

namespace Modules\Theme\View\Components\Slider;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Support\Facades\View;
use Illuminate\View\Component;

/**
 * Class Container.
 * html preso da DirectoryBs5, verificare se funziona anche con altri temi.
 */
class Container extends Component {
    public array $data;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(array $data) {
        $this->data = $data;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): Renderable {
<<<<<<< HEAD
        /**
         * @phpstan-var view-string
         */
=======
>>>>>>> ede0df7 (first)
        $view = 'theme::components.slider.container';
        $view_params = [
            'view' => $view,
            'data' => $this->data,
        ];

        return view()->make($view, $view_params);
    }
}
