<?php

declare(strict_types=1);

namespace Modules\Theme\View\Components\Pool;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Support\Collection;
use Illuminate\View\Component;

/**
 * Class Results.
 */
class Results extends Component {
    public Collection $rows;
    public string $title;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(Collection $rows, string $title) {
        $this->rows = $rows;
        $this->title = $title;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): Renderable {
        $view = 'theme::components.pool.results';
        $view_params = [
            'view' => $view,
        ];

        return view()->make($view, $view_params);
    }
}
