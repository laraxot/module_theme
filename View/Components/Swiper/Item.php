<?php

declare(strict_types=1);

namespace Modules\Theme\View\Components\Swiper;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\View\Component;

/**
 * Class Item.
 */
class Item extends Component {
    public array $attrs;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(?string $class = ' h-auto px-2', ?string $style = null) {
<<<<<<< HEAD
=======
        
>>>>>>> ede0df7 (first)
        $this->attrs['slide_class'] = $class;
        $this->attrs['slide_style'] = $style;
    }

    /**
     * Undocumented function.
     */
    public function render(): Renderable {
<<<<<<< HEAD
        /**
         * @phpstan-var view-string
         */
=======
>>>>>>> ede0df7 (first)
        $view = 'theme::components.swiper.item';

        $view_params = [
            'view' => $view,
        ];

        return view()->make($view, $view_params);
    }
<<<<<<< HEAD
}
=======
}
>>>>>>> ede0df7 (first)
