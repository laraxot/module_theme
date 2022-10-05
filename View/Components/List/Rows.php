<?php

declare(strict_types=1);

namespace Modules\Theme\View\Components\List;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Support\Collection;
use Illuminate\View\Component;
use Modules\Theme\Services\ThemeService;

/**
 * Class Rows.
 */
class Rows extends Component {
    public string $type;
    public Collection $icon_lists;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(Collection $icon_lists, ?string $type = 'rows') {
        $this->icon_lists = $icon_lists;
        $this->type = $type;
        // ThemeService::make()->add('theme::View/Components/Accordion/rows.scss');
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): Renderable {
        $view = 'theme::components.list.'.$this->type;
        $view_params = [
            'view' => $view,
        ];

        return view()->make($view, $view_params);
    }
}
