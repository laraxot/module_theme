<?php

declare(strict_types=1);

namespace Modules\Theme\View\Components;

use Illuminate\View\Component;
use Modules\Xot\Contracts\PanelContract;

/**
 * Class Breadcrumb.
 */
class Breadcrumb extends Component {
    public string $olClass;
    public PanelContract $panel;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(string $olClass, PanelContract $panel) {
        $this->olClass = $olClass;
        $this->panel = $panel;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): \Illuminate\Contracts\Support\Renderable {
        return view()->make('theme::components.breadcrumb');
    }
}
