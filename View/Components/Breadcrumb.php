<?php

declare(strict_types=1);

namespace Modules\Theme\View\Components;

<<<<<<< HEAD
use Illuminate\Contracts\Support\Renderable;
use Illuminate\View\Component;
=======
use Illuminate\View\Component;
use Modules\Xot\Contracts\PanelContract;
>>>>>>> ede0df7 (first)

/**
 * Class Breadcrumb.
 */
<<<<<<< HEAD
class Breadcrumb extends Component {
    public string $type;
=======
class Breadcrumb extends Component
{
    public string $olClass;
    public PanelContract $panel;
>>>>>>> ede0df7 (first)

    /**
     * Create a new component instance.
     *
     * @return void
     */
<<<<<<< HEAD
    public function __construct(?string $type = 'breadcrumb') {
        $this->type = $type;
=======
    public function __construct(string $olClass, PanelContract $panel)
    {
        $this->olClass = $olClass;
        $this->panel = $panel;
>>>>>>> ede0df7 (first)
    }

    /**
     * Get the view / contents that represent the component.
     */
<<<<<<< HEAD
    public function render(): Renderable {
        $view = 'theme::components.breadcrumb.'.$this->type;
        $view_params = [
            'view' => $view,
        ];

        return view()->make($view, $view_params);
=======
    public function render():\Illuminate\Contracts\Support\Renderable
    {
        return view()->make('theme::components.breadcrumb');
>>>>>>> ede0df7 (first)
    }
}
