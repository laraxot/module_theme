<?php

declare(strict_types=1);

namespace Modules\Theme\View\Components\Card;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\View\Component;

<<<<<<< HEAD
// use Modules\Xot\View\Components\XotBaseComponent;
=======
//use Modules\Xot\View\Components\XotBaseComponent;
>>>>>>> ede0df7 (first)

/**
 * Class Field.
 */
class Poster extends Component {
    /**
     * --.
     */
    public function __construct() {
    }

    /**
     * --.
     */
    public function render(): Renderable {
<<<<<<< HEAD
        /**
         * @phpstan-var view-string
         */
=======
>>>>>>> ede0df7 (first)
        $view = 'theme::components.card.poster';
        $view_params = [
            'view' => $view,
        ];

        return view()->make($view, $view_params);
    }

    public function shouldRender(): bool {
        return true;
    }
}
