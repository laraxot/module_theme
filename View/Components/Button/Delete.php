<?php

declare(strict_types=1);

namespace Modules\Theme\View\Components\Button;

use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Gate;
use Illuminate\View\Component;
use Modules\Xot\Contracts\PanelContract;

/**
 * Class Delete.
 */
class Delete extends Component
{
    public PanelContract $panel;
    public string $method = 'delete';

    /**
     * Undocumented function.
     */
    public function __construct(PanelContract $panel)
    {
        $this->panel = $panel;
    }

    public function render(): View
    {
        $view = 'theme::components.button.delete';
        $view_params = [
            'view' => $view,
        ];
        //if (! Gate::allows($this->method, $this->panel)) {
        //    return null;
        //}

        return view()->make($view, $view_params);
    }

    public function shouldRender(): bool
    {
        return Gate::allows($this->method, $this->panel);
    }
}