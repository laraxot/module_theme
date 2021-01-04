<?php

namespace Modules\Theme\Menu;

class Builder {
    public $menu = [];
    public $slim_header_menu = [];
    public $header_menu = [];
    public $footer_menu = [];
    public $footer_bar = [];

    /**
     * @var array
     */
    private $filters;

    public function __construct(array $filters = []) {
        $this->filters = $filters;
    }

    public function add_slim_header($menu) {
        //$items = $this->transformItems(func_get_args());
        $items = $this->transformItems($menu);
        //dddx(['items' => $items]);
        foreach ($items as $item) {
            array_push($this->slim_header_menu, $item);
        }
        /*
        dddx([
            'func_get_args' => func_get_args(),
            'slim_header_menu' => $this->slim_header_menu,
        ]);
        */
    }

    public function add_header($menu) {
        /*
        $items = $this->transformItems(func_get_args());
        */
        $items = $this->transformItems($menu);
        foreach ($items as $item) {
            array_push($this->header_menu, $item);
        }
    }

    public function add_footer($menu) {
        /*
        $items = $this->transformItems(func_get_args());
        */
        $items = $this->transformItems($menu);
        foreach ($items as $item) {
            array_push($this->footer_menu, $item);
        }
    }

    public function add_footer_bar($menu) {
        /*
        $items = $this->transformItems(func_get_args());
        */
        $items = $this->transformItems($menu);
        foreach ($items as $item) {
            array_push($this->footer_bar, $item);
        }
    }

    public function transformItems($items) {
        $res = array_filter(array_map([$this, 'applyFilters'], $items));
        //dddx(['items' => $items, 'res' => $res]);

        return $res;
    }

    protected function applyFilters($item) {
        if (is_string($item)) {
            return $item;
        }

        foreach ($this->filters as $filter) {
            $item = $filter->transform($item, $this);
        }

        if (isset($item['header'])) {
            $item = $item['header'];
        }

        return $item;
    }
}
