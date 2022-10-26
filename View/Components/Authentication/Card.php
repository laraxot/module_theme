<?php

declare(strict_types=1);

namespace Modules\Theme\View\Components\Authentication;

use Illuminate\View\Component;

// use Modules\Xot\View\Components\XotBaseComponent;

/**
 * Class Field.
 */
class Card extends Component
{
    public function render(): \Illuminate\Contracts\Support\Renderable
    {
        /**
         * @phpstan-var view-string
         */
        $view = 'theme::components.authentication.card';
        $view_params = [
            'view' => $view,
        ];

        return view()->make($view, $view_params);
    }
}
