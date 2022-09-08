<?php

declare(strict_types=1);

namespace Modules\Theme\View\Components\Authentication;

use Illuminate\View\Component;

// use Modules\Xot\View\Components\XotBaseComponent;

/**
 * Class Field.
 */
class CardLogo extends Component {
    public function render() {
        /**
         * @phpstan-var view-string
         */
        $view = 'theme::components.authentication.card-logo';
        $view_params = [
            'view' => $view,
        ];

        return view()->make($view, $view_params);
    }
}
