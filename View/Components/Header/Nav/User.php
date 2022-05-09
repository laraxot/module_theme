<?php

declare(strict_types=1);

namespace Modules\Theme\View\Components\Header\Nav;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\Component;

/**
 * Class Nav.
 */
class User extends Component {
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
        $view = 'theme::components.header.nav.user_';
        $view .= Auth::guest() ? 'guest' : 'logged';

        $view_params = [
            'view' => $view,
        ];

        return view()->make($view, $view_params);
    }
}
