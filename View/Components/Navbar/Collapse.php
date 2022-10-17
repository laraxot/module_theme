<?php

declare(strict_types=1);

namespace Modules\Theme\View\Components\Navbar;

<<<<<<< HEAD
// use Harimayco\Menu\Facades\Menu;
=======
//use Harimayco\Menu\Facades\Menu;
>>>>>>> ede0df7 (first)
use Illuminate\Contracts\Support\Renderable;
use Illuminate\View\Component;

/**
 * Class Collapse.
 */
class Collapse extends Component {
    public array $attrs = [];
    public array $menus = [];

<<<<<<< HEAD
    public string $menu_name;

=======
>>>>>>> ede0df7 (first)
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(string $menuName) {
<<<<<<< HEAD
        // $this->menus = Menu::getByName($menuName);
        $this->menu_name = $menuName;
=======
        //$this->menus = Menu::getByName($menuName);
>>>>>>> ede0df7 (first)
        $this->menus = [];
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): Renderable {
<<<<<<< HEAD
        /**
         * @phpstan-var view-string
         */
=======
>>>>>>> ede0df7 (first)
        $view = 'theme::components.navbar.collapse';

        $view_params = [
            'view' => $view,
        ];

        return view()->make($view, $view_params);
    }
}
