<?php

declare(strict_types=1);

namespace Modules\Theme\Http\Livewire;

use Livewire\Component;
use Modules\Theme\Services\MenuService;
use Modules\Theme\Services\SvgService;
use Modules\Theme\Services\ThemeService;

/**
 * Class HorMenu.
 */
class HorMenu extends Component {
    /**
     * @param array $all
     * @param int   $id_padre
     *
     * @return array
     */
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

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    /**
     * Render the component.
     */
    public function render(): \Illuminate\Contracts\Support\Renderable {
        /**
         * @phpstan-var view-string
         */
        $view = 'theme::livewire.hor_menu';

        $menu['items'][] = [
            'title' => 'Dashboard',
            'root' => true,
            'page' => '/',
            'new-tab' => false,
        ];

        // dddx($menu);
        $html = self::renderHorMenu($menu);

        // return $html;

        $view_params = [
            // 'view' => $view,
            'html' => $html,
        ];

        return view()->make($view, $view_params);
    }

    /**
     * @param array      $item
     * @param array|null $parent
     * @param int        $rec
     *
     * @return string
     */
    public static function renderHorMenu($item, $parent = null, $rec = 0) {
        $html = '';
        MenuService::checkRecursion($rec);
        if (! $item) {
            return 'menu misconfiguration';
        }

        // render separator
        if (isset($item['separator'])) {
            $html .= '<li class="menu-separator"><span></span></li>';
        } elseif (isset($item['title']) || isset($item['code'])) {
            $item_class = '';
            $item_attr = '';

            if (isset($item['submenu']) && MenuService::isActiveHorMenuItem($item, request()->path())) {
                $item_class .= ' menu-item-open menu-item-here'; // m-menu__item--active

                if ('tabs' === @$item['submenu']['type']) {
                    $item_class .= ' menu-item-active-tab ';
                }
            } elseif (MenuService::isActiveHorMenuItem($item, request()->path())) {
                $item_class .= ' menu-item-active ';

                if ('tabs' === @$item['submenu']['type']) {
                    $item_class .= ' menu-item-active-tab ';
                }
            }

            if (isset($item['submenu'])) {
                $item_class .= ' menu-item-submenu'; // m-menu__item--active

                if (isset($item['toggle']) && 'click' === $item['toggle']) {
                    $item_attr .= ' data-menu-toggle="click"';
                } elseif ('tabs' === @$item['submenu']['type']) {
                    $item_attr .= ' data-menu-toggle="tab"';
                } else {
                    $item_attr .= ' data-menu-toggle="hover"';
                }
            }

            if (true === @$item['redirect']) {
                $item_attr .= ' data-menu-redirect="1"';
            }

            if (isset($item['submenu'])) {
                if (! isset($item['submenu']['type'])) {
                    // default option
                    $item['submenu']['type'] = 'classic';
                    $item['submenu']['alignment'] = 'right';
                }
                if (('classic' === $item['submenu']['type']) && isset($item['root'])) {
                    $item_class .= ' menu-item-rel';
                }

                if (('mega' === $item['submenu']['type']) && isset($item['root']) && 'center' !== @$item['align']) {
                    $item_class .= ' menu-item-rel';
                }

                if ('tabs' === $item['submenu']['type']) {
                    $item_class .= ' menu-item-tabs';
                }
            }

            if (isset($item['submenu']['items']) && MenuService::isActiveHorMenuItem($item['submenu'], request()->path())) {
                $item_class .= ' menu-item-open menu-item-here'; // m-menu__item--active
            }

            if (isset($item['custom-class'])) {
                $item_class .= ' '.$item['custom-class'];
            }

            if (true === @$item['icon-only']) {
                $item_class .= ' menu-item-icon-only';
            }

            if (false === isset($item['heading'])) {
                $html .= '<li class="menu-item '.$item_class.'" '.$item_attr.' aria-haspopup="true">';
            }

            // check if code is provided instead of link
            if (isset($item['code'])) {
                $html .= $item['code'];
            } else {
                // insert title or heading
                if (false === isset($item['heading'])) {
                    $url = '#';

                    if (isset($item['page'])) {
                        $url = url($item['page']);
                    }

                    $target = '';
                    if (isset($item['new-tab']) && true === $item['new-tab']) {
                        $target = 'target="_blank"';
                    }

                    $html .= '<a '.$target.' href="'.$url.'" class="menu-link '.(isset($item['submenu']) ? 'menu-toggle' : '').'">';
                } else {
                    $html .= '<h3 class="menu-heading menu-toggle">';
                }

                // put root level arrow
                if (true === @$item['here']) {
                    $html .= '<span class="menu-item-here"></span>';
                }

                // bullet
                $bullet = '';
                if (! isset($parent['bullet'])) {
                    $parent['bullet'] = '';
                }

                if ((@$item['heading'] && 'dot' === @$item['bullet']) || 'dot' === @$parent['bullet']) {
                    $bullet = 'dot';
                } elseif ((@$item['heading'] && 'line' === @$item['bullet']) || 'line' === @$parent['bullet']) {
                    $bullet = 'line';
                }

                // Menu icon OR bullet
                if ('dot' === $bullet) {
                    $html .= '<i class="menu-bullet menu-bullet-dot"><span></span></i>';
                } elseif ('line' === $bullet) {
                    $html .= '<i class="menu-bullet menu-bullet-line"><span></span></i>';
                } elseif (isset($item['icon']) && ! empty($item['icon'])) {
                    $html .= ThemeService::renderIcon($item['icon']);
                }

                // Badge
                $html .= '<span class="menu-text">'.$item['title'].'</span>';
                if (isset($item['label'])) {
                    $html .= '<span class="menu-badge"><span class="label '.$item['label']['type'].'">'.$item['label']['value'].'</span></span>';
                }
                // Arrow
                if (isset($item['submenu']) && (! isset($item['arrow']) || false !== $item['arrow'])) {
                    // root down arrow
                    if (isset($item['root'])) {
                        // enable/disable root arrow
                        if (false !== config('layout.header.menu.self.root-arrow')) {
                            $html .= '<i class="menu-hor-arrow"></i>';
                        }
                    } else {
                        // inner menu arrow
                        $html .= '<i class="menu-hor-arrow"></i>';
                    }
                    $html .= '<i class="menu-arrow"></i>';
                }

                // closing title or heading
                if (false === isset($item['heading'])) {
                    $html .= '</a>';
                } else {
                    $html .= '<i class="menu-arrow"></i></h3>';
                }

                if (isset($item['submenu'])) {
                    $submenu_class = '';
                    if (\in_array($item['submenu']['type'], ['classic', 'tabs'], true)) {
                        if (isset($item['submenu']['alignment'])) {
                            $submenu_class = ' menu-submenu-'.$item['submenu']['alignment'];

                            if (isset($item['submenu']['pull']) && true === $item['submenu']['pull']) {
                                $submenu_class .= ' menu-submenu-pull';
                            }
                        }

                        if ('tabs' === $item['submenu']['type']) {
                            $submenu_class .= ' menu-submenu-tabs';
                        }

                        $html .= '<div class="menu-submenu menu-submenu-classic'.$submenu_class.'">';

                        $html .= '<ul class="menu-subnav">';
                        $items = [];
                        if (isset($item['submenu']['items'])) {
                            $items = $item['submenu']['items'];
                        } else {
                            $items = $item['submenu'];
                        }
                        foreach ($items as $submenu_item) {
                            $html .= self::renderHorMenu($submenu_item, $item, $rec++);
                        }
                        $html .= '</ul>';
                        $html .= '</div>';
                    } elseif ('mega' === $item['submenu']['type']) {
                        $submenu_fixed_width = '';

                        if ((int) (@$item['submenu']['width']) > 0) {
                            $submenu_class = ' menu-submenu-fixed';
                            $submenu_fixed_width = 'style="width:'.$item['submenu']['width'].'"';
                        } else {
                            $submenu_class = ' menu-submenu-'.$item['submenu']['width'];
                        }

                        if (isset($item['submenu']['alignment'])) {
                            $submenu_class .= ' menu-submenu-'.$item['submenu']['alignment'];

                            if (isset($item['submenu']['pull']) && true === $item['submenu']['pull']) {
                                $submenu_class .= ' menu-submenu-pull';
                            }
                        }

                        $html .= '<div class="menu-submenu '.$submenu_class.'" '.$submenu_fixed_width.'>';

                        $html .= '<div class="menu-subnav">';
                        $html .= '<ul class="menu-content">';
                        foreach ($item['submenu']['columns'] as $column) {
                            $item_class = '';
                            // mega menu column header active
                            if (isset($column['items']) && MenuService::isActiveVerMenuItem($column, request()->path())) {
                                $item_class .= ' menu-item-open menu-item-here'; // m-menu__item--active
                            }

                            $html .= '<li class="menu-item '.$item_class.'">';
                            if (isset($column['heading'])) {
                                $html .= self::renderHorMenu($column['heading'], null, $rec++);
                            }
                            $html .= '<ul class="menu-inner">';
                            foreach ($column['items'] as $column_submenu_item) {
                                $html .= self::renderHorMenu($column_submenu_item, $column, $rec++);
                            }
                            $html .= '</ul>';
                            $html .= '</li>';
                        }
                        $html .= '</ul>';
                        $html .= '</div>';
                        $html .= '</div>';
                    }
                }
            }

            if (false === isset($item['heading'])) {
                $html .= '</li>';
            }
        } elseif (\is_array($item)) {
            foreach ($item as $each) {
                $html .= self::renderHorMenu($each, $parent, $rec++);
            }
        }

        return $html;
    }

    /*
    public static function checkRecursion($rec, $max = 10000) {
        if ($rec > $max) {
            echo 'Too many recursions!!!';
            exit;
        }
    }



    public static function renderIcon($icon) {
        if (SvgService::isSVG($icon)) {
            return SvgService::getSVG($icon, 'menu-icon');
        } else {
            return '<i class="menu-icon '.$icon.'"></i>';
        }
    }


    public static function isActiveHorMenuItem($item, $page, $rec = 0) {
        if (true === @$item['redirect']) {
            return false;
        }

        self::checkRecursion($rec);

        if (isset($item['page']) && $item['page'] == $page) {
            return true;
        }

        if (is_array($item)) {
            foreach ($item as $each) {
                if (self::isActiveHorMenuItem($each, $page, $rec++)) {
                    return true;
                }
            }
        }

        return false;
    }


    public static function isActiveVerMenuItem($item, $page, $rec = 0) {
        if (true === @$item['redirect']) {
            return false;
        }

        self::checkRecursion($rec);

        if (isset($item['page']) && $item['page'] == $page) {
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
     */
}
