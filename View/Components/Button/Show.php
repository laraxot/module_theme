<?php

declare(strict_types=1);

namespace Modules\Theme\View\Components\Button;

use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Gate;
use Illuminate\View\Component;
use Modules\Xot\Contracts\PanelContract;

/**
 * Class Show.
 */
class Show extends Component
{
    public PanelContract $panel;
    public string $method = 'show';

    /**
     * Undocumented function.
     */
    public function __construct(PanelContract $panel)
    {
        $this->panel = $panel;
    }

    /**
     * Undocumented function.
     */
    public function render(): ?View
    {
        /**
         * @phpstan-var view-string
         */
        $view = 'theme::components.button.show';
        $view_params = [
            'view' => $view,
        ];
        if (! Gate::allows($this->method, $this->panel)) {
            return null;
        }

        return view()->make($view, $view_params);
    }
}
