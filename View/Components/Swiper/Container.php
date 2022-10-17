<?php

declare(strict_types=1);

namespace Modules\Theme\View\Components\Swiper;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\View\Component;

/**
 * Class Container.
 */
class Container extends Component {
    public array $attrs;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(
        ?string $containerClass = '',
        ?string $wrapperClass = '',
        ?string $wrapperStyle = ''
<<<<<<< HEAD
    ) {
=======
        ) {
>>>>>>> ede0df7 (first)
        $this->attrs['container_class'] = $containerClass;
        $this->attrs['wrapper_class'] = $wrapperClass;
        $this->attrs['wrapper_style'] = $wrapperStyle;
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
        $view = 'theme::components.swiper.container';

        $view_params = [
            'view' => $view,
        ];

        return view()->make($view, $view_params);
    }
}
