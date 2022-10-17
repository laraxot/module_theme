<?php

declare(strict_types=1);

namespace Modules\Theme\View\Components\Counter;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\View\Component;

/**
 * Class Container.
 */
<<<<<<< HEAD
class Container extends Component {
    public ?string $img;
=======
class Container extends Component
{

>>>>>>> ede0df7 (first)

    /**
     * Create a new component instance.
     *
     * @return void
     */
<<<<<<< HEAD
    public function __construct(?string $img = 'pub_theme::img/src/banner-2.jpg') {
=======
    public function __construct(?string $img = 'pub_theme::img/src/banner-2.jpg')
    {
>>>>>>> ede0df7 (first)
        $this->img = $img;
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
        $view = 'theme::components.counter.container';

        $view_params = [
            'img' => $this->img,
            'view' => $view,
        ];

        return view()->make($view, $view_params);
    }
}
