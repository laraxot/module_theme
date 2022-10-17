<?php

declare(strict_types=1);

namespace Modules\Theme\View\Components\Counter;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\View\Component;

/**
 * Class Container.
 */
class Container extends Component {
    public ?string $img;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(?string $img = 'pub_theme::img/src/banner-2.jpg') {
        $this->img = $img;
    }

    /**
     * Undocumented function.
     */
    public function render(): Renderable {
        /**
         * @phpstan-var view-string
         */
        $view = 'theme::components.counter.container';

        $view_params = [
            'img' => $this->img,
            'view' => $view,
        ];

        return view()->make($view, $view_params);
    }
}
