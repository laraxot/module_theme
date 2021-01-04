<?php

namespace Modules\Theme\Http\Livewire;

use Illuminate\Support\Facades\Route;
use Livewire\Component;
use Modules\Theme\Services\SvgService;
use Modules\Theme\Services\ThemeService;
use Modules\Xot\Services\PanelService as Panel;
use Modules\Xot\Services\TenantService;

class VerMenu extends Component {
    public static function parse($all, $id_padre = 0) {
        $data = [];
        if (! isset($all[$id_padre])) {
            return $data;
        }
        $arr = $all[$id_padre];
        foreach ($arr as $k => $v) {
            $tmp = [
                'title' => $v->nome,
                'page' => $v->url,
            ];
            $submenu = self::parse($all, $v->id);
            if (! empty($submenu)) {
                $tmp['submenu'] = $submenu;
            }
            $data[] = $tmp;
        }

        return $data;
    }

    public function render() {
        //$menu = TenantService::config('menu_aside.items');//menu iniziale di test
        $route_params = Route::current()->parameters();
        //dddx($route_params);
        $menu = [];

        $module_menu = self::parse(ThemeService::getXmlMenu());
        $menu[] = $module_menu;
        //dddx($module_menu);

        if (isset($route_params['module'])) {
            $models = getModuleModels($route_params['module']);
            //dddx([$models, $route_params]);
            $submenu = collect($models)->map(function ($item, $key) use ($route_params) {
                $parz = $route_params;
                if (! isset($parz['lang'])) {
                    $parz['lang'] = \App::getLocale();
                }
                $parz['container0'] = $key;
                $route = route('admin.container0.index', $parz, false);

                return ['title' => $key, 'page' => $route];
            })->all();

            $menu[] = [
                'title' => 'Models',
                'desc' => '',
                'icon' => 'media/svg/icons/Design/Bucket.svg',
                'bullet' => 'dot',
                'root' => true,
                'submenu' => $submenu,
            ];
        } else {
            $panel = Panel::get(\Auth::user());
            $areas = $panel->areas();
            foreach ($areas as $area) {
                $menu[] = [
                    'title' => $area->area_define_name,
                    'desc' => '',
                    'icon' => 'media/svg/icons/Design/Bucket.svg',
                    //'icon' => $area->icon_src,
                    'bullet' => 'dot',
                    'root' => true,
                    'page' => '/admin/'.\mb_strtolower($area->area_define_name),
                ];
            }
        }

        $html = self::renderVerMenu($menu);
        /*
        $view = $route_params['module'].'::ver_menu';
        if (view()->exists($view)) {
            return view($view)->with(['html' => $html]);
        }
        */
        return $html;
    }

    public static function renderVerMenu($item, $parent = null, $rec = 0, $singleItem = false) {
        $html = '';
        self::checkRecursion($rec);
        if (! $item) {
            //return '<div>menu misconfiguration</div>';

            return '<div></div>';
        }

        if (isset($item['separator'])) {
            $html .= '<li class="menu-separator"><span></span></li>';
        } elseif (isset($item['section'])) {
            $html .= '<li class="menu-section '.(0 === $rec ? 'menu-section--first' : '').'">
                <h4 class="menu-text">'.$item['section'].'</h4>
                <i class="menu-icon flaticon-more-v2"></i>
            </li>';
        } elseif (isset($item['title'])) {
            $item_class = '';
            $item_attr = '';

            if (isset($item['submenu'])) {
                $item_class .= ' menu-item-submenu'; // m-menu__item--active

                if (isset($item['toggle']) && 'click' == $item['toggle']) {
                    $item_attr .= ' data-menu-toggle="click"';
                } else {
                    $item_attr .= ' data-menu-toggle="hover"';
                }

                if (isset($item['mode'])) {
                    $item_attr .= ' data-menu-mode="'.$item['mode'].'"';
                }

                if (isset($item['dropdown-toggle-class'])) {
                    $item_attr .= ' data-menu-toggle-class="'.$item['dropdown-toggle-class'].'"';
                }
            }

            if (true === @$item['redirect']) {
                $item_attr .= ' data-menu-redirect="1"';
            }

            // parent item for hoverable submenu
            if (isset($item['parent'])) {
                $item_class .= ' menu-item-parent'; // m-menu__item--active
            }

            // custom class for menu item
            if (isset($item['custom-class'])) {
                $item_class .= ' '.$item['custom-class'];
            }

            if (isset($item['submenu']) && self::isActiveVerMenuItem($item, request()->path())) {
                $item_class .= ' menu-item-open menu-item-here'; // m-menu__item--active
            } elseif (self::isActiveVerMenuItem($item, request()->path())) {
                $item_class .= ' menu-item-active';
            }

            $html .= '<li class="menu-item '.$item_class.'" aria-haspopup="true" '.$item_attr.'>';
            if (isset($item['parent'])) {
                $html .= '<span class="menu-link">';
            } else {
                $url = '#';

                if (isset($item['page'])) {
                    $url = url($item['page']);
                }

                $target = '';
                if (isset($item['new-tab']) && true == $item['new-tab']) {
                    $target = 'target="_blank"';
                }

                $html .= '<a '.$target.' href="'.$url.'" class="menu-link '.(isset($item['submenu']) ? 'menu-toggle' : '').'">';
            }

            // Menu arrow
            if (true === @$item['here']) {
                $html .= '<span class="menu-item-here"></span>';
            }

            // bullet
            $bullet = '';

            if (null != $parent && isset($parent['bullet']) && 'dot' == $parent['bullet']) {
                $bullet = 'dot';
            } elseif (null != $parent && isset($parent['bullet']) && 'line' == $parent['bullet']) {
                $bullet = 'line';
            }

            // Menu icon OR bullet
            if ('dot' == $bullet) {
                $html .= '<i class="menu-bullet menu-bullet-dot"><span></span></i>';
            } elseif ('line' == $bullet) {
                $html .= '<i class="menu-bullet menu-bullet-line"><span></span></i>';
            } elseif (true !== config('layout.aside.menu.hide-root-icons') && isset($item['icon']) && ! empty($item['icon'])) {
                $html .= ThemeService::renderIcon($item['icon']);
            }

            // Badge
            $html .= '<span class="menu-text">'.$item['title'].'</span>';
            if (isset($item['label'])) {
                $html .= '<span class="menu-badge"><span class="label '.$item['label']['type'].'">'.$item['label']['value'].'</span></span>';
            }

            if (true == $singleItem) {
                if (isset($item['parent'])) {
                    $html .= '</span>';
                } else {
                    $html .= '</a>';
                }

                $html .= '</li>';

                return;
            }

            if (isset($item['submenu'])) {
                if (false == isset($item['root']) && 'plus-minus' == config('layout.menu.aside.submenu.arrow')) {
                    $html .= '<i class="menu-arrow menu-arrow-pm"><span><span></span></span></i>';
                } elseif (false == isset($item['root']) && 'plus-minus-square' == config('layout.menu.aside.submenu.arrow')) {
                    $html .= '<i class="menu-arrow menu-arrow-pm-square"><span><span></span></span></i>';
                } elseif (false == isset($item['root']) && 'plus-minus-circle' == config('layout.menu.aside.submenu.arrow')) {
                    $html .= '<i class="menu-arrow menu-arrow-pm-circle"><span><span></span></span></i>';
                } else {
                    if (false !== @$item['arrow'] && false !== config('layout.aside.menu.root-arrow')) {
                        $html .= '<i class="menu-arrow"></i>';
                    }
                }
            }

            if (isset($item['parent'])) {
                $html .= '</span>';
            } else {
                $html .= '</a>';
            }

            if (isset($item['submenu'])) {
                $submenu_dir = '';
                if (isset($item['submenu-up']) && true === $item['submenu-up']) {
                    $submenu_dir = 'menu-submenu-up';
                }
                $html .= '<div class="menu-submenu '.$submenu_dir.'">';
                $html .= '<span class="menu-arrow"></span>';

                if (isset($item['custom-class']) && ('menu-item-submenu-stretch' === $item['custom-class'] || 'menu-item-submenu-scroll' === $item['custom-class'])) {
                    $html .= '<div class="menu-wrapper">';
                }

                if (isset($item['scroll'])) {
                    $html .= '<div class="menu-scroll" data-scroll="true" style="height: '.$item['scroll'].'">';
                }

                $html .= '<ul class="menu-subnav">';
                if (isset($item['root'])) {
                    $parent_item = $item;
                    $parent_item['parent'] = true;
                    unset($parent_item['icon'], $parent_item['submenu']);

                    $html .= self::renderVerMenu($parent_item, null, $rec++, true); // single item render
                }
                foreach ($item['submenu'] as $submenu_item) {
                    $html .= self::renderVerMenu($submenu_item, $item, $rec++);
                }
                $html .= '</ul>';

                if (isset($item['scroll']) || isset($item['custom-class']) && 'menu-item-submenu-stretch' === $item['custom-class']) {
                    $html .= '</div>';
                }
                $html .= '</div>';
            }

            $html .= '</li>';
        } else {
            foreach ($item as $each) {
                $html .= self::renderVerMenu($each, $parent, $rec++);
            }
        }

        return $html;
    }

    // Checks recursion depth
    public static function checkRecursion($rec, $max = 10000) {
        if ($rec > $max) {
            echo 'Too many recursions!!!';
            exit;
        }
    }

    // Check for active Vertical Menu item
    public static function isActiveVerMenuItem($item, $page, $rec = 0) {
        if (true === @$item['redirect']) {
            return false;
        }

        self::checkRecursion($rec);

        if (isset($item['page']) && $item['page'] == '/'.$page) {
            return true;
        }

        if (is_array($item)) {
            foreach ($item as $each) {
                if (self::isActiveVerMenuItem($each, $page, $rec++)) {
                    return true;
                }
            }
        }

        return false;
    }

    /*
    // Render icon or bullet
    public static function renderIcon($icon) {
        if (SvgService::isSVG($icon)) {
            return SvgService::getSVG($icon, 'menu-icon');
        } else {
            return '<i class="menu-icon '.$icon.'"></i>';
        }
    }
    */
}
