<?php

declare(strict_types=1);

namespace Modules\Theme\View\Components\Nav;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\View\Component;

/**
 * Class Scroll.
 */
class Scroll extends Component {
    public string $type = 'scroll';
    public array $link_list;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(array $linkList) {
        $this->link_list = $linkList;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): Renderable {
        $view = 'theme::components.nav.'.$this->type;
        $view_params = [
            'view' => $view,
        ];

        return view()->make($view, $view_params);
    }
}
