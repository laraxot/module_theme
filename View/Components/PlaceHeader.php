<?php

declare(strict_types=1);

namespace Modules\Theme\View\Components;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\View\Component;

/**
 * Class Container.
 */
class PlaceHeader extends Component {
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(?string $img = 'pub_theme::img/src/banner-9.jpg', ?string $title = 'Submit your place', ?string $subtitle = 'Home / Submit your place') {
        $this->img = $img;
        $this->title = $title;
        $this->subtitle = $subtitle;
    }

    /**
     * Undocumented function.
     */
    public function render(): Renderable {
        $view = 'theme::components.place_header';

        $view_params = [
            'img' => $this->img,
            'title' => $this->title,
            'subtitle' => $this->subtitle,
            'view' => $view,
        ];

        return view()->make($view, $view_params);
    }
}
