<?php

declare(strict_types=1);

namespace Modules\Theme\View\Components;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\View\Component;
use Illuminate\Support\Collection;

/**
 * Class Select.
 */
class Select extends Component {
    public string $type = 'select';
    // public Collection $options;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct() {
        // $this->options = $options;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): Renderable {
        $view = 'theme::components.'.$this->type;
        $view_params = [
            'view' => $view,
        ];

        return view()->make($view, $view_params);
    }
}
