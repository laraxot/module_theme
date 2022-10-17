<?php

declare(strict_types=1);

namespace Modules\Theme\View\Components\Card;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\View\Component;
use Modules\Xot\Contracts\PanelContract;

<<<<<<< HEAD
// use Modules\Xot\View\Components\XotBaseComponent;
=======
//use Modules\Xot\View\Components\XotBaseComponent;
>>>>>>> ede0df7 (first)

/**
 * Class Field.
 */
class Panel extends Component {
    public PanelContract $panel;

    /**
     * --.
     */
    public function __construct(PanelContract $panel) {
        $this->panel = $panel;
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
        $view = 'theme::components.card.panel';
        $view_params = [
            'view' => $view,
        ];

        return view()->make($view, $view_params);
    }

    public function shouldRender(): bool {
        return true;
    }
}
