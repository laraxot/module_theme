<?php

declare(strict_types=1);

namespace Modules\Theme\Menu;

/**
 * Class Builder.
 */
class Builder {
    public array $menu = [];

    public array $slim_header_menu = [];

    public array $header_menu = [];

    public array $footer_menu = [];

    public array $footer_bar = [];

    private array $filters;

    public function __construct(array $filters = []) {
        $this->filters = $filters;
    }

    /**
     * @param array $menu
     */
    public function add_slim_header($menu): void {
        // $items = $this->transformItems(func_get_args());
        $items = $this->transformItems($menu);
        // dddx(['items' => $items]);
        foreach ($items as $item) {
            $this->slim_header_menu[] = $item;
        }
        /*
        dddx([
            'func_get_args' => func_get_args(),
            'slim_header_menu' => $this->slim_header_menu,
        ]);
        */
    }

    /**
     * @param array $menu
     */
    public function add_header($menu): void {
        /*
        $items = $this->transformItems(func_get_args());
        */
        $items = $this->transformItems($menu);
        foreach ($items as $item) {
            $this->header_menu[] = $item;
        }
    }

    /**
     * @param array $menu
     */
    public function add_footer($menu): void {
        /*
        $items = $this->transformItems(func_get_args());
        */
        $items = $this->transformItems($menu);
        foreach ($items as $item) {
            $this->footer_menu[] = $item;
        }
    }

    /**
     * @param array $menu
     */
    public function add_footer_bar($menu): void {
        /*
        $items = $this->transformItems(func_get_args());
        */
        $items = $this->transformItems($menu);
        foreach ($items as $item) {
            $this->footer_bar[] = $item;
        }
    }

    /**
     * @param array $items
     *
     * @return array
     */
    public function transformItems($items) {
        $res = array_filter(array_map([$this, 'applyFilters'], $items));
        // dddx(['items' => $items, 'res' => $res]);

        return $res;
    }

    /**
     * @param array|string $item
     *
     * @return mixed|string
     */
    protected function applyFilters($item) {
        if (\is_string($item)) {
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
