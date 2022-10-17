<?php

declare(strict_types=1);

namespace Modules\Theme\View\Components;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\View\Component;

<<<<<<< HEAD
class BaseLayout extends Component {
=======
class BaseLayout extends Component
{
>>>>>>> ede0df7 (first)
    /**
     * Create a new component instance.
     *
     * @return void
     */
<<<<<<< HEAD
    public function __construct() {
    }

    public function render(): Renderable {
        /**
         * @phpstan-var view-string
         */
        $view = 'pub_theme::components.layouts.base';
        $view_params = ['view' => $view];

=======
    public function __construct()
    {
    }

    public function render():Renderable
    {
        

        $view='pub_theme::components.layouts.base';
        $view_params=['view'=>$view];
>>>>>>> ede0df7 (first)
        return view()->make($view, $view_params);
    }
}
