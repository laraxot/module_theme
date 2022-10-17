<?php

declare(strict_types=1);

namespace Modules\Theme\View\Components;

use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\View\Component;

/**
 * Class Pagination.
 */
class Pagination extends Component {
<<<<<<< HEAD
    // public \Illuminate\Pagination\LengthAwarePaginator $rows;
=======
    //public \Illuminate\Pagination\LengthAwarePaginator $rows;
>>>>>>> ede0df7 (first)
    public LengthAwarePaginator $rows;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(LengthAwarePaginator $rows) {
        $this->rows = $rows;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): \Illuminate\Contracts\Support\Renderable {
<<<<<<< HEAD
        /**
         * @phpstan-var view-string
         */
=======
>>>>>>> ede0df7 (first)
        $view = 'theme::components.pagination';
        $view_params = [
            'view' => $view,
        ];

        return view()->make($view, $view_params);
    }
}
