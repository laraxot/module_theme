<?php

declare(strict_types=1);

namespace Modules\Theme\View\Components;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\View\Component;

/**
 * Class Container.
 */
<<<<<<< HEAD
class PlaceHeader extends Component {
    public ?string $img;
    public ?string $title;
    public ?string $subtitle;

=======
class PlaceHeader extends Component
{
>>>>>>> ede0df7 (first)
    /**
     * Create a new component instance.
     *
     * @return void
     */
<<<<<<< HEAD
    public function __construct(?string $img = 'pub_theme::img/src/banner-9.jpg', ?string $title = 'Submit your place', ?string $subtitle = 'Home / Submit your place') {
=======
    public function __construct(?string $img = 'pub_theme::img/src/banner-9.jpg', ?string $title = 'Submit your place', ?string $subtitle = 'Home / Submit your place')
    {
>>>>>>> ede0df7 (first)
        $this->img = $img;
        $this->title = $title;
        $this->subtitle = $subtitle;
    }

    /**
     * Undocumented function.
     */
<<<<<<< HEAD
    public function render(): Renderable {
        /**
         * @phpstan-var view-string
         */
=======
    public function render(): Renderable
    {
>>>>>>> ede0df7 (first)
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
