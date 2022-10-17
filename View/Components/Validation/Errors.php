<?php

declare(strict_types=1);

namespace Modules\Theme\View\Components\Validation;

use Illuminate\Contracts\View\View as ViewContract;
use Illuminate\View\Component;
use Illuminate\View\View;

/**
 * Class Sub.
 */
<<<<<<< HEAD
class Errors extends Component {
=======
class Errors extends Component
{
>>>>>>> ede0df7 (first)
    /**
     * Create a new component instance.
     *
     * @return void
     */
<<<<<<< HEAD
    public function __construct() {
=======
    public function __construct()
    {
>>>>>>> ede0df7 (first)
    }

    /**
     * Get the view / contents that represent the component.
     */
<<<<<<< HEAD
    public function render(): ViewContract {
        /**
         * @phpstan-var view-string
         */
=======
    public function render(): ViewContract
    {
>>>>>>> ede0df7 (first)
        $view = 'theme::components.validation.errors';
        $view_params = [
            'view' => $view,
        ];

        return view()->make($view, $view_params);
    }
}
