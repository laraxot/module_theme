<?php

declare(strict_types=1);

namespace Modules\Theme\View\Components\Accordion;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Support\Collection;
use Illuminate\View\Component;
use Modules\Theme\Services\ThemeService;

/**
 * Class Rows.
 */
class Rows extends Component
{
    public string $type = 'rows';
    public Collection $rows;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(Collection $rows)
    {
        $this->rows = $rows;
        // ThemeService::make()->add('theme::View/Components/Accordion/rows.scss');
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): Renderable
    {
        $view = 'theme::components.accordion.'.$this->type;
        $view_params = [
            'view' => $view,
        ];

        return view()->make($view, $view_params);
    }
}
