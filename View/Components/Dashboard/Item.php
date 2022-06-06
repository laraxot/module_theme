<?php

declare(strict_types=1);

namespace Modules\Theme\View\Components\Dashboard;

use Illuminate\View\Component;

// use Modules\Xot\View\Components\XotBaseComponent;

/**
 * Class Field.
 */
class Item extends Component {
    public function render(): \Illuminate\Contracts\Support\Renderable {
        /** 
        * @phpstan-var view-string
        */
        $view = 'theme::empty';
        $view_params = [
            'view' => $view,
        ];

        return view()->make($view, $view_params);
    }

    public function shouldRender(): bool {
        return false;
    }
}
