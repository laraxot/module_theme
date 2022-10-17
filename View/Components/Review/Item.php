<?php

declare(strict_types=1);

namespace Modules\Theme\View\Components\Review;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\View\Component;

/**
 * Class Item.
 */
<<<<<<< HEAD
class Item extends Component {
    public ?string $avatar;
    public ?string $name;
    public ?string $stars;
    public ?string $date;
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
    public function __construct(
        ?string $avatar = 'pub_theme::img/src/round-avatar-1.jpg',
        ?string $name = 'Name',
        ?string $stars = '4.5',
        ?string $date = '01.02.2021'
    ) {
=======
    public function __construct(?string $avatar = 'pub_theme::img/src/round-avatar-1.jpg', ?string $name = 'Name', ?string $stars = '4.5', ?string $date = '01.02.2021')
    {
>>>>>>> ede0df7 (first)
        $this->avatar = $avatar;
        $this->name = $name;

        $this->stars = $stars;
        $this->date = $date;
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
