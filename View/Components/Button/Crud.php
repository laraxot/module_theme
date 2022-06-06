<?php

declare(strict_types=1);

namespace Modules\Theme\View\Components\Button;

use Illuminate\Contracts\View\View;
use Modules\Xot\Contracts\PanelContract;
use Modules\Xot\View\Components\XotBaseComponent;

/**
 * Class Crud.
 */
class Crud extends XotBaseComponent {
    public PanelContract $panel;

    /**
     * Undocumented function.
     */
    public function __construct(PanelContract $panel) {
        $this->panel = $panel;
    }

    /**
     * Undocumented function.
     */
    public function render(): View {
        /** 
        * @phpstan-var view-string
        */
        $view = 'theme::components.button.crud';
        $view_params = [
            'view' => $view,
        ];

        return view()->make($view, $view_params);
    }
}
