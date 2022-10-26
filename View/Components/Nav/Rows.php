<?php

declare(strict_types=1);

namespace Modules\Theme\View\Components\Nav;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Support\Collection;
use Illuminate\View\Component;

/**
 * Class Rows.
 */
class Rows extends Component
{
    public string $type = 'scroll';
    public Collection $link_lists;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(Collection $rows)
    {
        $this->link_lists = $rows;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): Renderable
    {
        $view = 'theme::components.nav.rows.'.$this->type;
        $view_params = [
            'view' => $view,
        ];

        return view()->make($view, $view_params);
    }
}
