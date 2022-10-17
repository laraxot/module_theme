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
<<<<<<< HEAD
class Delete extends Component {
=======
class Delete extends Component
{
>>>>>>> ede0df7 (first)
    public PanelContract $panel;
    public string $method = 'delete';

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
        $view = 'theme::components.button.delete';
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
