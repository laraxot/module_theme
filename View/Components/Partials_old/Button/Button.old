<?php

declare(strict_types=1);

namespace Modules\Theme\View\Components\Partials\Button;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\View\Component;

/**
 * Class Button.
 */
class Button extends Component {
    public string $type = 'button';

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct() {
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): Renderable {
        $view = 'theme::components.partials.button.'.$this->type;
        $view_params = [
            'view' => $view,
        ];

        return view()->make($view, $view_params);
    }
}
