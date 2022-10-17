<?php

declare(strict_types=1);

namespace Modules\Theme\View\Components;

use Illuminate\View\Component;

/**
 * Class Faq.
 */
<<<<<<< HEAD
class SelectionHighlight extends Component {
=======
class SelectionHighlight extends Component
{
>>>>>>> ede0df7 (first)
    public string $txt;
    public string $driver;

    /**
     * Create a new component instance.
     *
     * @return void
     */
<<<<<<< HEAD
    public function __construct(string $driver, string $txt) {
=======
    public function __construct(string $driver, string $txt)
    {
>>>>>>> ede0df7 (first)
        $this->driver = $driver;
        $this->txt = $txt;
    }

    /**
     * Get the view / contents that represent the component.
     */
<<<<<<< HEAD
    public function render(): \Illuminate\Contracts\Support\Renderable {
        /**
         * @phpstan-var view-string
         */
=======
    public function render():\Illuminate\Contracts\Support\Renderable
    {
>>>>>>> ede0df7 (first)
        $view = 'theme::components.selection_highlight.'.$this->driver;
        $view_params = [
            'view' => $view,
        ];

        return view()->make($view, $view_params);
    }
}
