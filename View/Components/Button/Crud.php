<?php

declare(strict_types=1);

namespace Modules\Theme\View\Components\Button;

use Illuminate\Contracts\View\View;
use Modules\Xot\Contracts\PanelContract;
use Modules\Xot\View\Components\XotBaseComponent;

/**
 * Class Crud.
 */
<<<<<<< HEAD
class Crud extends XotBaseComponent {
=======
class Crud extends XotBaseComponent
{
>>>>>>> ede0df7 (first)
    public PanelContract $panel;

    /**
     * Undocumented function.
     */
<<<<<<< HEAD
    public function __construct(PanelContract $panel) {
=======
    public function __construct(PanelContract $panel)
    {
>>>>>>> ede0df7 (first)
        $this->panel = $panel;
    }

    /**
     * Undocumented function.
     */
<<<<<<< HEAD
    public function render(): View {
        /**
         * @phpstan-var view-string
         */
=======
    public function render(): View
    {
>>>>>>> ede0df7 (first)
        $view = 'theme::components.button.crud';
        $view_params = [
            'view' => $view,
        ];

        return view()->make($view, $view_params);
    }
}
