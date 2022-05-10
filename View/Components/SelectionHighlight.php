<?php

declare(strict_types=1);

namespace Modules\Theme\View\Components;

use Illuminate\View\Component;

/**
 * Class Faq.
 */
class SelectionHighlight extends Component {
    public string $txt;
    public string $driver;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(string $driver, string $txt) {
        $this->driver = $driver;
        $this->txt = $txt;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): \Illuminate\Contracts\Support\Renderable {
        $view = 'theme::components.selection_highlight.'.$this->driver;
        $view_params = [
            'view' => $view,
        ];

        return view()->make($view, $view_params);
    }
}
