<?php

declare(strict_types=1);

namespace Modules\Theme\View\Components\Input;

use Illuminate\View\Component;

class Error extends Component
{
    public string $for;

    /**
     * Undocumented function.
     */
    public function __construct(string $for)
    {
        $this->for = $for;
    }

    /**
     * Get the view / contents that represents the component.
     */
    public function render(): \Illuminate\Contracts\Support\Renderable
    {
        /**
         * @phpstan-var view-string
         */
        $view = 'theme::components.input.error';
        $view_params = [
            'view' => $view,
        ];

        return view($view, $view_params);
    }
}
