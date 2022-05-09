<?php

declare(strict_types=1);

namespace Modules\Theme\View\Components\Navbar;

//use Harimayco\Menu\Facades\Menu;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\View\Component;

/**
 * Class Collapse.
 */
class Collapse extends Component {
    public array $attrs = [];
    public array $menus = [];

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(string $menuName) {
        //$this->menus = Menu::getByName($menuName);
        $this->menus = [];
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): Renderable {
        $view = 'theme::components.navbar.collapse';

        $view_params = [
            'view' => $view,
        ];

        return view()->make($view, $view_params);
    }
}
