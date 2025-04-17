<?php

declare(strict_types=1);

namespace Modules\Theme\View\Components\Nav\Tabs;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\View\Component;

/**
 * Item.
 */
class Item extends Component
{
    public bool $active = false;
    public string $url;
    public string $title;

    public function __construct(string $url, string $title, bool $active = false)
    {
        $this->url = $url;
        $this->active = $active;
        $this->title = $title;
    }

    /**
     * Get the view / contents that represents the component.
     */
    public function render(): Renderable
    {
        /**
         * @phpstan-var view-string
         */
        $view = 'theme::components.nav.tabs.item';
        $view_params = [
            'view' => $view,
        ];

        return view($view, $view_params);
    }
}
