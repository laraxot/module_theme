<?php

declare(strict_types=1);

namespace Modules\Theme\View\Components;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\View\Component;

/**
 * Class Spinner.
 */
class Spinner extends Component {
    public string $type;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(?string $type = null) {
        if (null === $type) {
            $type = 'default';
        }
        $this->type = $type;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): Renderable {
        $view = 'theme::components.spinner.'.$this->type;
        $view_params = [
            'view' => $view,
        ];

        return view()->make($view, $view_params);
    }
}
