<?php

declare(strict_types=1);

namespace Modules\Theme\View\Components\PlaceCard;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\View\Component;

/**
 * Class Container.
 */
class Container extends Component {
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(?string $title = 'Add Your Place') {
        $this->title = $title;
    }

    /**
     * Undocumented function.
     */
    public function render(): Renderable {
        $view = 'theme::components.place_card.container';

        $view_params = [
            'title' => $this->title,
            'view' => $view,
        ];

        return view()->make($view, $view_params);
    }
}
