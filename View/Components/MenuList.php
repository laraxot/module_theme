<?php

declare(strict_types=1);

namespace Modules\Theme\View\Components;

// /use Harimayco\Menu\Facades\Menu;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Support\Str;
use Illuminate\View\Component;

/**
 * Undocumented class.
 */
class MenuList extends Component {
    // public array $attrs = [];
    public array $menus = [];
    public ?string $title = null;
    public array $attrs;

    public string $menu_name;

    public function __construct(string $menuName, ?string $title = null, ?string $titleClass = null, ?string $ulClass = null, ?string $aliClass = null) {
        // $this->menus = Menu::getByName($menuName);
        $this->menu_name = $menuName;
        $this->menus = [];
        $this->title = $title;
        $this->attrs['class'] = 'text-uppercase';

        // $this->attrs['titleClass'] = isset($titleClass) ? $titleClass : 'text-uppercase text-dark mb-3';

        $this->attrs['titleClass'] = 'text-uppercase text-dark mb-3';
        if (isset($titleClass) && ! Str::startsWith($titleClass, '+')) {
            $this->attrs['titleClass'] = ' '.$titleClass;
        }
        if (isset($titleClass) && Str::startsWith($titleClass, '+')) {
            $this->attrs['titleClass'] .= ' '.Str::after($titleClass, '+');
        }

        $this->attrs['ulClass'] = 'list-unstyled';
        if (isset($ulClass) && ! Str::startsWith($ulClass, '+')) {
            $this->attrs['ulClass'] = ' '.$ulClass;
        }
        if (isset($ulClass) && Str::startsWith($ulClass, '+')) {
            $this->attrs['ulClass'] .= ' '.Str::after($ulClass, '+');
        }

        $this->attrs['aliClass'] = 'text-muted';
        if (isset($aliClass) && ! Str::startsWith($aliClass, '+')) {
            $this->attrs['aliClass'] = ' '.$aliClass;
        }
        if (isset($aliClass) && Str::startsWith($aliClass, '+')) {
            $this->attrs['aliClass'] .= ' '.Str::after($aliClass, '+');
        }
    }

    public function render(): Renderable {
        /**
         * @phpstan-var view-string
         */
        $view = 'theme::components.menu-list';

        $view_params = [
            'view' => $view,
        ];

        return view()->make($view, $view_params);
    }
}
