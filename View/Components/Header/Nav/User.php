<?php

declare(strict_types=1);

namespace Modules\Theme\View\Components\Header\Nav;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\Component;

/**
 * Class Nav.
 */
class User extends Component
{
    public array $attrs = [];
    public ?string $view;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(?string $view = 'theme::components.header.nav.user_')
    {
        $this->view = $view;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): Renderable
    {
        /**
         * @phpstan-var view-string
         */
        // $view = 'theme::components.header.nav.user_';
        $view = $this->view;
        $view .= Auth::guest() ? 'guest' : 'logged';

        $view_params = [
            'view' => $view,
        ];

        return view()->make($view, $view_params);
    }
}
