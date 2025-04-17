<?php

declare(strict_types=1);

namespace Modules\Theme\View\Components;

use Illuminate\View\Component;

/**
 * Class FlashMessage.
 */
class FlashMessage extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): \Illuminate\Contracts\Support\Renderable
    {
        $view = 'theme::components.flash_message';
        $view_params = [
            'view' => $view,
        ];

        return view()->make($view, $view_params);
    }
}
