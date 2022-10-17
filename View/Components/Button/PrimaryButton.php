<?php

declare(strict_types=1);

namespace Modules\Theme\View\Components\Button;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\View\Component;

<<<<<<< HEAD
class PrimaryButton extends Component {
=======
class PrimaryButton extends Component
{
>>>>>>> ede0df7 (first)
    /**
     * Create the component instance.
     *
     * @return void
     */
<<<<<<< HEAD
    public function __construct() {
        // $this->type = $type;
        // $this->message = $message;
    }

    public function render(): Renderable {
        /**
         * @phpstan-var view-string
         */
        $view = 'theme::components.button.primary-button';
        $view_params = ['view' => $view];

=======
    public function __construct()
    {
        //$this->type = $type;
        //$this->message = $message;
    }

    
    public function render():Renderable
    {
        $view='theme::components.button.primary-button';
        $view_params=['view'=>$view];
>>>>>>> ede0df7 (first)
        return view()->make($view, $view_params);
    }
}
