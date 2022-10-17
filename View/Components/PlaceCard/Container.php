<?php

declare(strict_types=1);

namespace Modules\Theme\View\Components\PlaceCard;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\View\Component;

/**
 * Class Container.
 */
<<<<<<< HEAD
class Container extends Component {
    public ?string $title;
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
    public function __construct(?string $title = 'Add Your Place') {
=======
    public function __construct(?string $title = 'Add Your Place')
    {
>>>>>>> ede0df7 (first)
        $this->title = $title;
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
        $view = 'theme::components.place_card.container';

        $view_params = [
            'title' => $this->title,
            'view' => $view,
        ];

        return view()->make($view, $view_params);
    }
}
