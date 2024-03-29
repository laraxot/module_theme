<?php

declare(strict_types=1);

namespace Modules\Theme\View\Components;

use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\View\Component;

/**
 * Class Pagination.
 */
class Pagination extends Component
{
    // public \Illuminate\Pagination\LengthAwarePaginator $rows;
    public LengthAwarePaginator $rows;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(LengthAwarePaginator $rows)
    {
        $this->rows = $rows;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): \Illuminate\Contracts\Support\Renderable
    {
        /**
         * @phpstan-var view-string
         */
        $view = 'theme::components.pagination';
        $view_params = [
            'view' => $view,
        ];

        return view()->make($view, $view_params);
    }
}
