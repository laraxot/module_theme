<?php

declare(strict_types=1);

namespace Modules\Theme\View\Components\Header;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\View\Component;

/**
 * Class Nav.
 */
class Nav extends Component {
    public array $attrs = [];

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct() {
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): Renderable {
        /** 
        * @phpstan-var view-string
        */
        $view = 'theme::components.header.nav';

        $view_params = [
            'view' => $view,
            'search_action' => config('xra.search_action'),
            'logo' => config('metatag.logo_img'),
        ];

        return view()->make($view, $view_params);
    }
}
