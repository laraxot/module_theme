<?php

declare(strict_types=1);

namespace Modules\Theme\View\Components\Card;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\View\Component;
use Modules\Xot\Contracts\PanelContract;

// use Modules\Xot\View\Components\XotBaseComponent;

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
