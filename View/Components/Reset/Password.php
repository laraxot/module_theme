<?php

declare(strict_types=1);

namespace Modules\Theme\View\Components\Reset;

use Illuminate\View\Component;

/**
 * Class Password.
 */
class Password extends Component {
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
    public function render(): \Illuminate\Contracts\Support\Renderable {
        return view()->make('pub_theme::components.reset.password');
    }
}
