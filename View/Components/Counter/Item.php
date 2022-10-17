<?php

declare(strict_types=1);

namespace Modules\Theme\View\Components\Counter;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\View\Component;

/**
 * Class Item.
 */
<<<<<<< HEAD
class Item extends Component {
    public ?string $number;
    public ?string $title;
=======
class Item extends Component
{

>>>>>>> ede0df7 (first)

    /**
     * Create a new component instance.
     *
     * @return void
     */
<<<<<<< HEAD
    public function __construct(?string $number = '197', ?string $title = 'Title') {
        /* ?string $imgurl = 'pub_theme::img/src/plan-1.jpg', ?string $title = 'Add Your Place', ?string $price = '3.99 /mo', ?string $width = '370', ?string $height = '205' */
=======
    public function __construct(?string $number = '197', ?string $title = 'Title')
    {
        /*?string $imgurl = 'pub_theme::img/src/plan-1.jpg', ?string $title = 'Add Your Place', ?string $price = '3.99 /mo', ?string $width = '370', ?string $height = '205'*/
>>>>>>> ede0df7 (first)
        $this->number = $number;
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
        $view = 'theme::components.counter.item';

        $view_params = [
            'number' => $this->number,
            'title' => $this->title,
            'view' => $view,
        ];

        return view()->make($view, $view_params);
    }
}
