<?php

declare(strict_types=1);

namespace Modules\Theme\View\Components\Button;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\View\Component;

class SecondaryCta extends Component {
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
        $view = 'theme::components.button.secondary-cta';
        $view_params = ['view' => $view];

        return view()->make($view);
    }
}
