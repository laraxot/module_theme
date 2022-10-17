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
<<<<<<< HEAD
class Show extends Component {
=======
class Show extends Component
{
>>>>>>> ede0df7 (first)
    public PanelContract $panel;
    public string $method = 'show';

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
    public function render(): ?View {
        /**
         * @phpstan-var view-string
         */
=======
    public function render(): ?View
    {
>>>>>>> ede0df7 (first)
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
