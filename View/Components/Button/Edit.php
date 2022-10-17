<?php

declare(strict_types=1);

namespace Modules\Theme\View\Components\Button;

use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Gate;
use Modules\Xot\Contracts\PanelContract;
use Modules\Xot\View\Components\XotBaseComponent;

/**
 * Class Edit.
 */
<<<<<<< HEAD
class Edit extends XotBaseComponent {
=======
class Edit extends XotBaseComponent
{
>>>>>>> ede0df7 (first)
    public PanelContract $panel;
    public string $method = 'edit';

    /**
     * Undocumented function.
     */
<<<<<<< HEAD
    public function __construct(PanelContract $panel) {
        $this->panel = $panel;
    }

    public function render(): View {
        /**
         * @phpstan-var view-string
         */
=======
    public function __construct(PanelContract $panel)
    {
        $this->panel = $panel;
    }

    public function render(): View
    {
>>>>>>> ede0df7 (first)
        $view = 'theme::components.button.edit';
        $view_params = [
            'view' => $view,
        ];
<<<<<<< HEAD
        // if (! Gate::allows($this->method, $this->panel)) {
        //    return null;
        // }
=======
        //if (! Gate::allows($this->method, $this->panel)) {
        //    return null;
        //}
>>>>>>> ede0df7 (first)

        return view()->make($view, $view_params);
    }

<<<<<<< HEAD
    public function shouldRender(): bool {
=======
    public function shouldRender(): bool
    {
>>>>>>> ede0df7 (first)
        return Gate::allows($this->method, $this->panel);
    }
}
