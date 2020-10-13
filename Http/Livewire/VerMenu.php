<?php

namespace Modules\Theme\Http\Livewire;

use Livewire\Component;
use Modules\Xot\Services\TenantService;

//use Modules\Cart\Models\BookingItem;

class VerMenu extends Component {
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
        $menu = TenantService::config('menu_aside.items');

        $html = self::renderVerMenu($menu);

        return $html;
    }

    public static function renderVerMenu($item, $parent = null, $rec = 0, $singleItem = false) {
        $html = '';
        self::checkRecursion($rec);
        if (! $item) {
            return 'menu misconfiguration';
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
                $html .= self::renderIcon($item['icon']);
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

    // Render icon or bullet
    public static function renderIcon($icon) {
        if (self::isSVG($icon)) {
            return self::getSVG($icon, 'menu-icon');
        } else {
            return '<i class="menu-icon '.$icon.'"></i>';
        }
    }

    /**
     * Check if $path provided is SVG.
     */
    public static function isSVG($path) {
        if (is_string($path)) {
            return 'svg' === substr(strrchr($path, '.'), 1);
        }

        return false;
    }

    /**
     * Get SVG content.
     *
     * @param string $filepath
     * @param string $class
     *
     * @return string|string[]|null
     */
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

        return '<span class="'.implode(' ', $cls).'"><!--begin::Svg Icon | path:'.$filepath.'-->'.$string.'<!--end::Svg Icon--></span>';
    }
}
