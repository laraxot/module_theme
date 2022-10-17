<?php

declare(strict_types=1);

namespace Modules\Theme\View\Components\Partials\Tag;


use Illuminate\Contracts\Support\Renderable;
use Illuminate\View\Component;

/**
 * Class Tag.
 */
class Tag extends Component {
    public string $type = 'tag';

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
    public function render(): Renderable {
        $view = 'theme::components.partials.tag.'.$this->type;
        $view_params = [
            'view' => $view,
        ];

        return view()->make($view, $view_params);
    }
}
