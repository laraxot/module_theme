<?php

declare(strict_types=1);

namespace Modules\Theme\View\Components\Button;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\View\Component;

class PrimaryCta extends Component {
    /**
     * Create the component instance.
     *
     * @return void
     */
    public function __construct() {
        // $this->type = $type;
        // $this->message = $message;
    }

    public function render(): Renderable {
        /**
         * @phpstan-var view-string
         */
        $view = 'theme::components.button.primary-cta';
        $view_params = ['view' => $view];

        return view()->make($view, $view_params);
    }
}
