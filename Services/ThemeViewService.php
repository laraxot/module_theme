<?php

declare(strict_types=1);

namespace Modules\Theme\Services;


use Modules\Cms\Services\PanelService;
use Modules\Theme\Menu\Builder;

/**
 * Class ThemeViewService.
 */
class ThemeViewService {
    protected array $menu = [];
    protected array $filters = [];
    protected array $events;
    protected string $container;

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

    // public function __call($method, $arguments) {
    // Note: value of $name is case sensitive.
    /*
    echo "Calling object method '$method' "
         .implode(', ', $arguments)."\n";
    */
    //    $home_panel = PanelService::make()->getHomePanel();

    //    return $home_panel->{$method}(...$arguments);
    // }

    // public static function __callStatic($name, $arguments) {
    // Note: value of $name is case sensitive.
    //    echo "Calling static method '$name' "
    //         .implode(', ', $arguments)."\n";
    // }

    public function url(): string {
        return '['.__FILE__.']['.__LINE__.']';
    }

    /*-- da ripristinare
    public function menu(): array {
        if (! $this->menu) {
            $this->menu = $this->buildMenu();
        }

        return $this->menu;
    }
    */

    protected function buildMenu(): array {
        $builder = new Builder($this->buildFilters());
        // dddx($builder);
        $menu = (array) config('bootstrap-italia.menu');
        // dddx(['slim-header' => $menu['slim-header']]);
        $builder->add_slim_header((array) $menu['slim-header']);
        $builder->add_header((array) $menu['header']);
        $builder->add_footer((array) $menu['footer']);
        $builder->add_footer_bar((array) $menu['footer-bar']);

        // dddx($builder);
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

    protected function buildFilters(): array {
        if (! $this->filters) {
            $this->filters = (array) config('bootstrap-italia.filters');
        }
        /*
        return array_map([$this->container, 'make'], $this->filters);
        */
        // \Illuminate\Contracts\Foundation\Application
        return collect($this->filters)->map(
            function ($item) {
                // return app($item); //deve essere app perche' crea l'oggetto etc etc con injunction etc etc , QUANDO LO USEREMO
                return $item;
            }
        )->all();
    }

    public function isInternalPage(): bool {
        /*
        $home_panel = PanelService::make()->getHomePanel();

        return $home_panel->isInternalPage();
        */
        $params = getRouteParameters();

        return \count($params) < 2;
    }
}