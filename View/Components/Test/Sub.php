<?php

namespace Modules\Theme\View\Components\Test;

use Illuminate\Contracts\View\View as ViewContract;
use Illuminate\View\Component;
use Illuminate\View\View;

/**
 * Class Sub
 * @package Modules\Theme\View\Components\Test
 */
class Sub extends Component {
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct() {
    }

    /**
     * Get the view / contents that represent the component.
     * @return ViewContract
     * @return ViewContract
     */
    public function render(): ViewContract {
        return view()->make('components.forms.input');
    }
}
