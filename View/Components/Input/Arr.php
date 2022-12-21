<?php

declare(strict_types=1);

namespace Modules\Theme\View\Components\Input;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\View\Component;

// Arr because Array is reserved

class Arr extends Component {
    public string $type;

    /**
     * Undocumented function.
     */
    public function __construct(string $type) {
        $this->type = $type;
    }

    /**
     * Get the view / contents that represents the component.
     */
    public function render(): Renderable {
        /**
         * @phpstan-var view-string
         */
        $view = 'theme::components.input.array';
        $view_params = [
            'view' => $view,
        ];

        return view($view, $view_params);
    }
}
