<?php

declare(strict_types=1);

namespace Modules\Theme\View\Components\Card;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Database\Eloquent\Model as Eloquent;
use Illuminate\View\Component;

// use Modules\Xot\View\Components\XotBaseComponent;

/**
 * Class Field.
 */
class Model extends Component {
    public Eloquent $model;

    /**
     * --.
     */
    public function __construct(Eloquent $model) {
        $this->model = $model;
    }

    /**
     * --.
     */
    public function render(): Renderable {
        /**
         * @phpstan-var view-string
         */
        $view = 'theme::components.card.model';
        $view_params = [
            'view' => $view,
        ];

        return view()->make($view, $view_params);
    }

    public function shouldRender(): bool {
        return true;
    }
}
