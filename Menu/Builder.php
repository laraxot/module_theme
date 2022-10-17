<?php

declare(strict_types=1);

namespace Modules\Theme\Menu;

/**
 * Class Builder.
 */
<<<<<<< HEAD
class Builder {
=======
class Builder
{
>>>>>>> ede0df7 (first)
    public array $menu = [];

    public array $slim_header_menu = [];

    public array $header_menu = [];

    public array $footer_menu = [];

    public array $footer_bar = [];

    private array $filters;

<<<<<<< HEAD
    public function __construct(array $filters = []) {
=======
    public function __construct(array $filters = [])
    {
>>>>>>> ede0df7 (first)
        $this->filters = $filters;
    }

    /**
     * @param array $menu
     */
<<<<<<< HEAD
    public function add_slim_header($menu): void {
        // $items = $this->transformItems(func_get_args());
        $items = $this->transformItems($menu);
        // dddx(['items' => $items]);
        foreach ($items as $item) {
            $this->slim_header_menu[] = $item;
=======
    public function add_slim_header($menu): void
    {
        //$items = $this->transformItems(func_get_args());
        $items = $this->transformItems($menu);
        //dddx(['items' => $items]);
        foreach ($items as $item) {
            array_push($this->slim_header_menu, $item);
>>>>>>> ede0df7 (first)
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
<<<<<<< HEAD
    public function add_header($menu): void {
=======
    public function add_header($menu): void
    {
>>>>>>> ede0df7 (first)
        /*
        $items = $this->transformItems(func_get_args());
        */
        $items = $this->transformItems($menu);
        foreach ($items as $item) {
<<<<<<< HEAD
            $this->header_menu[] = $item;
=======
            array_push($this->header_menu, $item);
>>>>>>> ede0df7 (first)
        }
    }

    /**
     * @param array $menu
     */
<<<<<<< HEAD
    public function add_footer($menu): void {
=======
    public function add_footer($menu): void
    {
>>>>>>> ede0df7 (first)
        /*
        $items = $this->transformItems(func_get_args());
        */
        $items = $this->transformItems($menu);
        foreach ($items as $item) {
<<<<<<< HEAD
            $this->footer_menu[] = $item;
=======
            array_push($this->footer_menu, $item);
>>>>>>> ede0df7 (first)
        }
    }

    /**
     * @param array $menu
     */
<<<<<<< HEAD
    public function add_footer_bar($menu): void {
=======
    public function add_footer_bar($menu): void
    {
>>>>>>> ede0df7 (first)
        /*
        $items = $this->transformItems(func_get_args());
        */
        $items = $this->transformItems($menu);
        foreach ($items as $item) {
<<<<<<< HEAD
            $this->footer_bar[] = $item;
=======
            array_push($this->footer_bar, $item);
>>>>>>> ede0df7 (first)
        }
    }

    /**
     * @param array $items
     *
     * @return array
     */
<<<<<<< HEAD
    public function transformItems($items) {
        $res = array_filter(array_map([$this, 'applyFilters'], $items));
        // dddx(['items' => $items, 'res' => $res]);
=======
    public function transformItems($items)
    {
        $res = array_filter(array_map([$this, 'applyFilters'], $items));
        //dddx(['items' => $items, 'res' => $res]);
>>>>>>> ede0df7 (first)

        return $res;
    }

    /**
     * @param array|string $item
     *
     * @return mixed|string
     */
<<<<<<< HEAD
    protected function applyFilters($item) {
        if (\is_string($item)) {
=======
    protected function applyFilters($item)
    {
        if (is_string($item)) {
>>>>>>> ede0df7 (first)
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
