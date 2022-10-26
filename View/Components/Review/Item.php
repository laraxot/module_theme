<?php

declare(strict_types=1);

namespace Modules\Theme\View\Components\Review;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\View\Component;

/**
 * Class Item.
 */
class Item extends Component
{
    public ?string $avatar;
    public ?string $name;
    public ?string $stars;
    public ?string $date;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(
        ?string $avatar = 'pub_theme::img/src/round-avatar-1.jpg',
        ?string $name = 'Name',
        ?string $stars = '4.5',
        ?string $date = '01.02.2021'
    ) {
        $this->avatar = $avatar;
        $this->name = $name;

        $this->stars = $stars;
        $this->date = $date;
    }

    /**
     * Undocumented function.
     */
    public function render(): Renderable
    {
        /**
         * @phpstan-var view-string
         */
        $view = 'theme::components.review.item';

        $view_params = [
            'avatar' => $this->avatar,
            'name' => $this->name,
            'stars' => $this->stars,
            'date' => $this->date,
            'view' => $view,
        ];

        return view()->make($view, $view_params);
    }
}
