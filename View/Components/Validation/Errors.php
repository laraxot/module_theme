<?php

declare(strict_types=1);

namespace Modules\Theme\View\Components\Validation;

use Illuminate\Contracts\View\View as ViewContract;
use Illuminate\View\Component;
use Illuminate\View\View;

/**
 * Class Sub.
 */
class Errors extends Component {
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
    public function render(): ViewContract {
        /**
         * @phpstan-var view-string
         */
        $view = 'theme::components.validation.errors';
        $view_params = [
            'view' => $view,
        ];

        return view()->make($view, $view_params);
    }
}
