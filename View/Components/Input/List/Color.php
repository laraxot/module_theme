<?php

declare(strict_types=1);

namespace Modules\Theme\View\Components\Input\List;

<<<<<<< HEAD
use Illuminate\Contracts\Support\Renderable;
use Illuminate\View\Component;

class Color extends Component {
=======
use Illuminate\View\Component;
use Illuminate\Contracts\Support\Renderable;

class Color extends Component
{
>>>>>>> ede0df7 (first)
    public string $name;
    public string $value;

    /**
     * Undocumented function.
     */
<<<<<<< HEAD
    public function __construct(string $name, string $value) {
=======
    public function __construct(string $name, string $value)
    {
>>>>>>> ede0df7 (first)
        $this->name = $name;
        $this->value = $value;
    }

    /**
     * Get the view / contents that represents the component.
     */
<<<<<<< HEAD
    public function render(): Renderable {
        /**
         * @phpstan-var view-string
         */
        $view = 'theme::components.input.list.color';
        $view_params = [
            'view' => $view,
=======
    public function render():Renderable
    {
        $view = 'theme::components.input.list.color';
        $view_params = [
            'view' => $view
>>>>>>> ede0df7 (first)
        ];

        return view()->make($view, $view_params);
    }
}
