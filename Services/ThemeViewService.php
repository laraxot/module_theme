<?php

namespace Modules\Theme\Services;

use Modules\Theme\Menu\Builder;

class ThemeViewService {
    protected $menu;
    protected $filters;
    protected $events;
    protected $container;
    /*
    public function __construct(
        array $filters,
        Dispatcher $events,
        Container $container
    ) {
        $this->filters = $filters;
        $this->events = $events;
        $this->container = $container;
    }
    */

    public function menu() {
        if (! $this->menu) {
            $this->menu = $this->buildMenu();
        }

        return $this->menu;
    }

    protected function buildMenu() {
        $builder = new Builder($this->buildFilters());
        //dddx($builder);
        $menu = config('bootstrap-italia.menu');
        //dddx(['slim-header' => $menu['slim-header']]);
        $builder->add_slim_header($menu['slim-header']);
        $builder->add_header($menu['header']);
        $builder->add_footer($menu['footer']);
        $builder->add_footer_bar($menu['footer-bar']);

        //dddx($builder);
        /*
        if (method_exists($this->events, 'dispatch')) {
            $this->events->dispatch(new BuildingMenu($builder));
        } else {
            $this->events->fire(new BuildingMenu($builder));
        }
        */
        return [
            'slim-header-menu' => $builder->slim_header_menu,
            'header-menu' => $builder->header_menu,
            'footer-menu' => $builder->footer_menu,
            'footer-bar' => $builder->footer_bar,
        ];
    }

    protected function buildFilters() {
        if (! $this->filters) {
            $this->filters = config('bootstrap-italia.filters');
        }
        /*
        return array_map([$this->container, 'make'], $this->filters);
        */
        return collect($this->filters)->map(function ($item) {
            return app($item);
        })->all();
    }
}
