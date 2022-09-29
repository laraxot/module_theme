<?php

declare(strict_types=1);

namespace Modules\Theme\View\Components;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\View\Component;

class Input extends Component {
    public string $type;

    public array $attrs = [];

    /**
     * Create the component instance.
     *
     * @return void
     */
    public function __construct(?string $type = 'input') {
        $this->type = $type;
    }

    /**
     * Undocumented function.
     */
    public function render(): Renderable {
        /**
         * @phpstan-var view-string
         */
        $view = 'theme::components.input.'.$this->type;

        $view_params = ['view' => $view];

        return view()->make($view, $view_params);
    }
}
