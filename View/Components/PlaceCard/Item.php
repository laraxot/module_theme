<?php

declare(strict_types=1);

namespace Modules\Theme\View\Components\PlaceCard;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\View\Component;

/**
 * Class Item.
 */
<<<<<<< HEAD
class Item extends Component {
    public ?string $imgurl;
    public ?string $title;
    public ?string $price;
    public ?string $width;
    public ?string $height;
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
    public function __construct(?string $imgurl = 'pub_theme::img/src/plan-1.jpg', ?string $title = 'Add Your Place', ?string $price = '3.99 mo', ?string $width = '370', ?string $height = '205') {
        /* ?string $imgurl = 'pub_theme::img/src/plan-1.jpg', ?string $title = 'Add Your Place', ?string $price = '3.99 /mo', ?string $width = '370', ?string $height = '205' */
=======
    public function __construct(?string $imgurl = 'pub_theme::img/src/plan-1.jpg', ?string $title = 'Add Your Place', ?string $price = '3.99 mo', ?string $width = '370', ?string $height = '205')
    {
        /*?string $imgurl = 'pub_theme::img/src/plan-1.jpg', ?string $title = 'Add Your Place', ?string $price = '3.99 /mo', ?string $width = '370', ?string $height = '205'*/
>>>>>>> ede0df7 (first)
        $this->imgurl = $imgurl;
        $this->title = $title;
        $this->price = $price;
        $this->width = $width;
        $this->height = $height;
    }

    /**
     * Undocumented function.
     */
<<<<<<< HEAD
    public function render(): Renderable {
        /**
         * @phpstan-var view-string
         */
        $view = 'theme::components.place_card.item';

        $view_params = [
            /* ?string $imgurl = 'pub_theme::img/src/plan-1.jpg', ?string $title = 'Add Your Place', ?string $price = '3.99 /mo', ?string $width = '370', ?string $height = '205' */
=======
    public function render(): Renderable
    {
        $view = 'theme::components.place_card.item';

        $view_params = [
            /*?string $imgurl = 'pub_theme::img/src/plan-1.jpg', ?string $title = 'Add Your Place', ?string $price = '3.99 /mo', ?string $width = '370', ?string $height = '205'*/
>>>>>>> ede0df7 (first)
            'imgurl' => $this->imgurl,
            'title' => $this->title,
            'price' => $this->price,
            'width' => $this->width,
            'height' => $this->height,
            'view' => $view,
        ];

        return view()->make($view, $view_params);
    }
}
