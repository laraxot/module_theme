<?php

declare(strict_types=1);

namespace Modules\Theme\View\Components;

<<<<<<< HEAD
// use Harimayco\Menu\Facades\Menu;
=======
//use Harimayco\Menu\Facades\Menu;
>>>>>>> ede0df7 (first)
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Support\Str;
use Illuminate\View\Component;

/**
 * Undocumented class.
 */
<<<<<<< HEAD
class DropdownList extends Component {
    // public array $attrs = [];
    public array $menus = [];
    public ?string $title = null;

    public string $menu_name;

    public function __construct(string $menuName, ?string $title = null) {
        // $this->menus = Menu::getByName($menuName);
        $this->menu_name = $menuName;
        $this->menus = [];
        $this->title = $title;

        // $this->attrs = 'class="nav-link dropdown-toggle " id="homeDropdownMenuLink" href="index.html"
        // data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"';

        // $this->attrs['titleClass'] = isset($titleClass) ? $titleClass : 'text-uppercase text-dark mb-3';
=======
class DropdownList extends Component
{
    //public array $attrs = [];
    public array $menus = [];
    public ?string $title = null;

    public function __construct(string $menuName, ?string $title = null)
    {
        //$this->menus = Menu::getByName($menuName);
        $this->menus = [];
        $this->title = $title;

        //$this->attrs = 'class="nav-link dropdown-toggle " id="homeDropdownMenuLink" href="index.html"
        //data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"';

        //$this->attrs['titleClass'] = isset($titleClass) ? $titleClass : 'text-uppercase text-dark mb-3';
>>>>>>> ede0df7 (first)

        /*
        $this->attrs['aliClass'] = 'text-muted';
        if(isset($aliClass) && !Str::startsWith($aliClass, '+')){
            $this->attrs['aliClass'] = " ". $aliClass;
        }
        if(isset($aliClass) && Str::startsWith($aliClass, '+')){
            $this->attrs['aliClass'] .= " ". Str::after($aliClass, '+');
        }
        */
    }

<<<<<<< HEAD
    public function render(): Renderable {
        /**
         * @phpstan-var view-string
         */
=======

    public function render():Renderable
    {
>>>>>>> ede0df7 (first)
        $view = 'theme::components.dropdown-list';

        $view_params = [
            'view' => $view,
        ];

        return view()->make($view, $view_params);
    }
}
