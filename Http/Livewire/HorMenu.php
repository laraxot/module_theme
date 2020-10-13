<?php

namespace Modules\Theme\Http\Livewire;

use Livewire\Component;
use Modules\Xot\Services\TenantService;

class HorMenu extends Component {
    public function render() {
        /*
        $view = 'theme::livewire.ver_menu';
        $view_params = [
            'view' => $view,
            //'areas' => TenantService::model('area')->get(),
            'areas' => TenantService::model('area')->pluck('area_define_name')->all(),
        ];
        //dddx(TenantService::model('area')->pluck('nome')->all());

        return view($view, $view_params);
        */
        $menu = TenantService::config('menu_header.items');

        $html = self::renderHorMenu($menu);

        return $html;
    }

    public static function renderHorMenu($item, $parent = null, $rec = 0) {
        self::checkRecursion($rec);
        if (! $item) {
            return 'menu misconfiguration';
        }

        // render separator
        if (isset($item['separator'])) {
            echo '<li class="menu-separator"><span></span></li>';
        } elseif (isset($item['title']) || isset($item['code'])) {
            $item_class = '';
            $item_attr = '';

            if (isset($item['submenu']) && self::isActiveHorMenuItem($item, request()->path())) {
                $item_class .= ' menu-item-open menu-item-here'; // m-menu__item--active

                if ('tabs' == @$item['submenu']['type']) {
                    $item_class .= ' menu-item-active-tab ';
                }
            } elseif (self::isActiveHorMenuItem($item, request()->path())) {
                $item_class .= ' menu-item-active ';

                if ('tabs' == @$item['submenu']['type']) {
                    $item_class .= ' menu-item-active-tab ';
                }
            }

            if (isset($item['submenu'])) {
                $item_class .= ' menu-item-submenu'; // m-menu__item--active

                if (isset($item['toggle']) && 'click' == $item['toggle']) {
                    $item_attr .= ' data-menu-toggle="click"';
                } elseif ('tabs' == @$item['submenu']['type']) {
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
                if (('classic' == $item['submenu']['type']) && isset($item['root'])) {
                    $item_class .= ' menu-item-rel';
                }

                if (('mega' == $item['submenu']['type']) && isset($item['root']) && 'center' != @$item['align']) {
                    $item_class .= ' menu-item-rel';
                }

                if ('tabs' == $item['submenu']['type']) {
                    $item_class .= ' menu-item-tabs';
                }
            }

            if (isset($item['submenu']['items']) && self::isActiveHorMenuItem($item['submenu'], request()->path())) {
                $item_class .= ' menu-item-open menu-item-here'; // m-menu__item--active
            }

            if (isset($item['custom-class'])) {
                $item_class .= ' '.$item['custom-class'];
            }

            if (true == @$item['icon-only']) {
                $item_class .= ' menu-item-icon-only';
            }

            if (false == isset($item['heading'])) {
                echo '<li class="menu-item '.$item_class.'" '.$item_attr.' aria-haspopup="true">';
            }

            // check if code is provided instead of link
            if (isset($item['code'])) {
                echo $item['code'];
            } else {
                // insert title or heading
                if (false == isset($item['heading'])) {
                    $url = '#';

                    if (isset($item['page'])) {
                        $url = url($item['page']);
                    }

                    $target = '';
                    if (isset($item['new-tab']) && true == $item['new-tab']) {
                        $target = 'target="_blank"';
                    }

                    echo '<a '.$target.' href="'.$url.'" class="menu-link '.(isset($item['submenu']) ? 'menu-toggle' : '').'">';
                } else {
                    echo '<h3 class="menu-heading menu-toggle">';
                }

                // put root level arrow
                if (true === @$item['here']) {
                    echo '<span class="menu-item-here"></span>';
                }

                // bullet
                $bullet = '';

                if ((@$item['heading'] && 'dot' == @$item['bullet']) || 'dot' == @$parent['bullet']) {
                    $bullet = 'dot';
                } elseif ((@$item['heading'] && 'line' == @$item['bullet']) || 'line' == @$parent['bullet']) {
                    $bullet = 'line';
                }

                // Menu icon OR bullet
                if ('dot' == $bullet) {
                    echo '<i class="menu-bullet menu-bullet-dot"><span></span></i>';
                } elseif ('line' == $bullet) {
                    echo '<i class="menu-bullet menu-bullet-line"><span></span></i>';
                } elseif (isset($item['icon']) && ! empty($item['icon'])) {
                    self::renderIcon($item['icon']);
                }

                // Badge
                echo '<span class="menu-text">'.$item['title'].'</span>';
                if (isset($item['label'])) {
                    echo '<span class="menu-badge"><span class="label '.$item['label']['type'].'">'.$item['label']['value'].'</span></span>';
                }
                // Arrow
                if (isset($item['submenu']) && (! isset($item['arrow']) || false != $item['arrow'])) {
                    // root down arrow
                    if (isset($item['root'])) {
                        // enable/disable root arrow
                        if (false !== config('layout.header.menu.self.root-arrow')) {
                            echo '<i class="menu-hor-arrow"></i>';
                        }
                    } else {
                        // inner menu arrow
                        echo '<i class="menu-hor-arrow"></i>';
                    }
                    echo '<i class="menu-arrow"></i>';
                }

                // closing title or heading
                if (false == isset($item['heading'])) {
                    echo '</a>';
                } else {
                    echo '<i class="menu-arrow"></i></h3>';
                }

                if (isset($item['submenu'])) {
                    if (in_array($item['submenu']['type'], ['classic', 'tabs'])) {
                        if (isset($item['submenu']['alignment'])) {
                            $submenu_class = ' menu-submenu-'.$item['submenu']['alignment'];

                            if (isset($item['submenu']['pull']) && true == $item['submenu']['pull']) {
                                $submenu_class .= ' menu-submenu-pull';
                            }
                        }

                        if ('tabs' == $item['submenu']['type']) {
                            $submenu_class .= ' menu-submenu-tabs';
                        }

                        echo '<div class="menu-submenu menu-submenu-classic'.$submenu_class.'">';

                        echo '<ul class="menu-subnav">';
                        $items = [];
                        if (isset($item['submenu']['items'])) {
                            $items = $item['submenu']['items'];
                        } else {
                            $items = $item['submenu'];
                        }
                        foreach ($items as $submenu_item) {
                            self::renderHorMenu($submenu_item, $item, $rec++);
                        }
                        echo '</ul>';
                        echo '</div>';
                    } elseif ('mega' == $item['submenu']['type']) {
                        $submenu_fixed_width = '';

                        if (intval(@$item['submenu']['width']) > 0) {
                            $submenu_class = ' menu-submenu-fixed';
                            $submenu_fixed_width = 'style="width:'.$item['submenu']['width'].'"';
                        } else {
                            $submenu_class = ' menu-submenu-'.$item['submenu']['width'];
                        }

                        if (isset($item['submenu']['alignment'])) {
                            $submenu_class .= ' menu-submenu-'.$item['submenu']['alignment'];

                            if (isset($item['submenu']['pull']) && true == $item['submenu']['pull']) {
                                $submenu_class .= ' menu-submenu-pull';
                            }
                        }

                        echo '<div class="menu-submenu '.$submenu_class.'" '.($submenu_fixed_width).'>';

                        echo '<div class="menu-subnav">';
                        echo '<ul class="menu-content">';
                        foreach ($item['submenu']['columns'] as $column) {
                            $item_class = '';
                            // mega menu column header active
                            if (isset($column['items']) && self::isActiveVerMenuItem($column, request()->path())) {
                                $item_class .= ' menu-item-open menu-item-here'; // m-menu__item--active
                            }

                            echo '<li class="menu-item '.$item_class.'">';
                            if (isset($column['heading'])) {
                                self::renderHorMenu($column['heading'], null, $rec++);
                            }
                            echo '<ul class="menu-inner">';
                            foreach ($column['items'] as $column_submenu_item) {
                                self::renderHorMenu($column_submenu_item, $column, $rec++);
                            }
                            echo '</ul>';
                            echo '</li>';
                        }
                        echo '</ul>';
                        echo '</div>';
                        echo '</div>';
                    }
                }
            }

            if (false == isset($item['heading'])) {
                echo '</li>';
            }
        } elseif (is_array($item)) {
            foreach ($item as $each) {
                self::renderHorMenu($each, $parent, $rec++);
            }
        }
    }

    public static function checkRecursion($rec, $max = 10000) {
        if ($rec > $max) {
            echo 'Too many recursions!!!';
            exit;
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

    public static function renderIcon($icon) {
        if (self::isSVG($icon)) {
            echo self::getSVG($icon, 'menu-icon');
        } else {
            echo '<i class="menu-icon '.$icon.'"></i>';
        }
    }

    public static function getSVG($filepath, $class = '') {
        //  echo $filepath;

        if (! is_string($filepath) || ! file_exists($filepath)) {
            return '';
        }

        $svg_content = file_get_contents($filepath);

        $dom = new \DOMDocument();
        $dom->loadXML($svg_content);

        // remove unwanted comments
        $xpath = new \DOMXPath($dom);
        foreach ($xpath->query('//comment()') as $comment) {
            $comment->parentNode->removeChild($comment);
        }

        // remove unwanted tags
        $title = $dom->getElementsByTagName('title');
        if ($title['length']) {
            $dom->documentElement->removeChild($title[0]);
        }
        $desc = $dom->getElementsByTagName('desc');
        if ($desc['length']) {
            $dom->documentElement->removeChild($desc[0]);
        }
        $defs = $dom->getElementsByTagName('defs');
        if ($defs['length']) {
            $dom->documentElement->removeChild($defs[0]);
        }

        // remove unwanted id attribute in g tag
        $g = $dom->getElementsByTagName('g');
        foreach ($g as $el) {
            $el->removeAttribute('id');
        }
        $mask = $dom->getElementsByTagName('mask');
        foreach ($mask as $el) {
            $el->removeAttribute('id');
        }
        $rect = $dom->getElementsByTagName('rect');
        foreach ($rect as $el) {
            $el->removeAttribute('id');
        }
        $path = $dom->getElementsByTagName('path');
        foreach ($path as $el) {
            $el->removeAttribute('id');
        }
        $circle = $dom->getElementsByTagName('circle');
        foreach ($circle as $el) {
            $el->removeAttribute('id');
        }
        $use = $dom->getElementsByTagName('use');
        foreach ($use as $el) {
            $el->removeAttribute('id');
        }
        $polygon = $dom->getElementsByTagName('polygon');
        foreach ($polygon as $el) {
            $el->removeAttribute('id');
        }
        $ellipse = $dom->getElementsByTagName('ellipse');
        foreach ($ellipse as $el) {
            $el->removeAttribute('id');
        }

        $string = $dom->saveXML($dom->documentElement);

        // remove empty lines
        $string = preg_replace("/(^[\r\n]*|[\r\n]+)[\s\t]*[\r\n]+/", "\n", $string);

        $cls = ['svg-icon'];
        if (! empty($class)) {
            $cls = array_merge($cls, explode(' ', $class));
        }

        echo '<span class="'.implode(' ', $cls).'"><!--begin::Svg Icon | path:'.$filepath.'-->'.$string.'<!--end::Svg Icon--></span>';
    }

    public static function isSVG($path) {
        if (is_string($path)) {
            return 'svg' === substr(strrchr($path, '.'), 1);
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
}
