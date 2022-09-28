<?php

declare(strict_types=1);

namespace Modules\Theme\View\Components;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\View\Component;

/**
 * Class Nav.
 */
class Nav extends Component {
    public string $type = 'nav';

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
        $view = 'theme::components.nav.'.$this->type;
        dddx($view);
        $view_params = [
            'view' => $view,
        ];

        return view()->make($view, $view_params);
    }
}
