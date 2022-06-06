<?php

declare(strict_types=1);

namespace Modules\Theme\View\Components\PlaceCard;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\View\Component;

/**
 * Class Item.
 */
class Subitem extends Component {
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct() {
    }

    /**
     * Undocumented function.
     */
    public function render(): Renderable {
        /** 
        * @phpstan-var view-string
        */
        $view = 'theme::components.place_card.subitem';

        $view_params = [
            'view' => $view,
        ];

        return view()->make($view, $view_params);
    }
}
