<?php

declare(strict_types=1);

namespace Modules\Theme\View\Components\Review;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\View\Component;

/**
 * Class Container.
 */
class Container extends Component {
    public ?string $title;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(?string $title = 'Title') {
        $this->title = $title;
    }

    /**
     * Undocumented function.
     */
    public function render(): Renderable {
        /**
         * @phpstan-var view-string
         */
        $view = 'theme::components.review.container';

        $view_params = [
            'title' => $this->title,
            'view' => $view,
        ];

        return view()->make($view, $view_params);
    }
}
