<?php

declare(strict_types=1);

namespace Modules\Theme\View\Components\Counter;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\View\Component;

/**
 * Class Item.
 */
class Item extends Component
{
    public ?string $number;
    public ?string $title;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(?string $number = '197', ?string $title = 'Title')
    {
        /* ?string $imgurl = 'pub_theme::img/src/plan-1.jpg', ?string $title = 'Add Your Place', ?string $price = '3.99 /mo', ?string $width = '370', ?string $height = '205' */
        $this->number = $number;
        $this->title = $title;
    }

    /**
     * Undocumented function.
     */
    public function render(): Renderable
    {
        /**
         * @phpstan-var view-string
         */
        $view = 'theme::components.counter.item';

        $view_params = [
            'number' => $this->number,
            'title' => $this->title,
            'view' => $view,
        ];

        return view()->make($view, $view_params);
    }
}
