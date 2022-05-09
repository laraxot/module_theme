<?php

declare(strict_types=1);

namespace Modules\Theme\View\Components\PlaceCard;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\View\Component;

/**
 * Class Item.
 */
class Item extends Component
{


    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(?string $imgurl = 'pub_theme::img/src/plan-1.jpg', ?string $title = 'Add Your Place', ?string $price = '3.99 mo', ?string $width = '370', ?string $height = '205')
    {
        /*?string $imgurl = 'pub_theme::img/src/plan-1.jpg', ?string $title = 'Add Your Place', ?string $price = '3.99 /mo', ?string $width = '370', ?string $height = '205'*/
        $this->imgurl = $imgurl;
        $this->title = $title;
        $this->price = $price;
        $this->width = $width;
        $this->height = $height;
    }

    /**
     * Undocumented function.
     */
    public function render(): Renderable
    {
        $view = 'theme::components.place_card.item';

        $view_params = [
            /*?string $imgurl = 'pub_theme::img/src/plan-1.jpg', ?string $title = 'Add Your Place', ?string $price = '3.99 /mo', ?string $width = '370', ?string $height = '205'*/
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
