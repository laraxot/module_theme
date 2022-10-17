<?php

declare(strict_types=1);

namespace Modules\Theme\Services;

use Modules\Theme\Menu\Builder;
use Modules\Xot\Services\PanelService;

/**
 * Class ThemeViewService.
 */
<<<<<<< HEAD
class ThemeViewService {
=======
class ThemeViewService
{
>>>>>>> ede0df7 (first)
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

<<<<<<< HEAD
    // public function __call($method, $arguments) {
=======
    //public function __call($method, $arguments) {
>>>>>>> ede0df7 (first)
    // Note: value of $name is case sensitive.
    /*
    echo "Calling object method '$method' "
         .implode(', ', $arguments)."\n";
    */
    //    $home_panel = PanelService::make()->getHomePanel();

    //    return $home_panel->{$method}(...$arguments);
<<<<<<< HEAD
    // }

    // public static function __callStatic($name, $arguments) {
    // Note: value of $name is case sensitive.
    //    echo "Calling static method '$name' "
    //         .implode(', ', $arguments)."\n";
    // }

    public function url(): string {
=======
    //}

    //public static function __callStatic($name, $arguments) {
    // Note: value of $name is case sensitive.
    //    echo "Calling static method '$name' "
    //         .implode(', ', $arguments)."\n";
    //}

    public function url(): string
    {
>>>>>>> ede0df7 (first)
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

<<<<<<< HEAD
    protected function buildMenu(): array {
        $builder = new Builder($this->buildFilters());
        // dddx($builder);
        $menu = (array) config('bootstrap-italia.menu');
        // dddx(['slim-header' => $menu['slim-header']]);
=======
    protected function buildMenu(): array
    {
        $builder = new Builder($this->buildFilters());
        //dddx($builder);
        $menu = (array) config('bootstrap-italia.menu');
        //dddx(['slim-header' => $menu['slim-header']]);
>>>>>>> ede0df7 (first)
        $builder->add_slim_header((array) $menu['slim-header']);
        $builder->add_header((array) $menu['header']);
        $builder->add_footer((array) $menu['footer']);
        $builder->add_footer_bar((array) $menu['footer-bar']);

<<<<<<< HEAD
        // dddx($builder);
=======
        //dddx($builder);
>>>>>>> ede0df7 (first)
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

<<<<<<< HEAD
    protected function buildFilters(): array {
=======
    protected function buildFilters(): array
    {
>>>>>>> ede0df7 (first)
        if (! $this->filters) {
            $this->filters = (array) config('bootstrap-italia.filters');
        }
        /*
        return array_map([$this->container, 'make'], $this->filters);
        */
<<<<<<< HEAD
        // \Illuminate\Contracts\Foundation\Application
        return collect($this->filters)->map(
            function ($item) {
                // return app($item); //deve essere app perche' crea l'oggetto etc etc con injunction etc etc , QUANDO LO USEREMO
=======
        //\Illuminate\Contracts\Foundation\Application
        return collect($this->filters)->map(
            function ($item) {
                //return app($item); //deve essere app perche' crea l'oggetto etc etc con injunction etc etc , QUANDO LO USEREMO
>>>>>>> ede0df7 (first)
                return $item;
            }
        )->all();
    }

<<<<<<< HEAD
    public function isInternalPage(): bool {
=======
    public function isInternalPage(): bool
    {
>>>>>>> ede0df7 (first)
        /*
        $home_panel = PanelService::make()->getHomePanel();

        return $home_panel->isInternalPage();
        */
        $params = getRouteParameters();

<<<<<<< HEAD
        return \count($params) < 2;
=======
        return count($params) < 2;
>>>>>>> ede0df7 (first)
    }
}
