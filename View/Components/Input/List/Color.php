<?php

declare(strict_types=1);

namespace Modules\Theme\View\Components\Input\List;

use Illuminate\View\Component;
use Illuminate\Contracts\Support\Renderable;

class Color extends Component
{
    public string $name;
    public string $value;

    /**
     * Undocumented function.
     */
    public function __construct(string $name, string $value)
    {
        $this->name = $name;
        $this->value = $value;
    }

    /**
     * Get the view / contents that represents the component.
     */
    public function render():Renderable
    {
        $view = 'theme::components.input.list.color';
        $view_params = [
            'view' => $view
        ];

        return view()->make($view, $view_params);
    }
}
