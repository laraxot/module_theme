<?php

declare(strict_types=1);

namespace Modules\Theme\View\Components\Nav\Tabs\Content;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Support\Str;
use Illuminate\View\Component;

/**
 * Item.
 */
class Item extends Component {
    public bool $active = false;
    public string $url;
    public string $item_id;

    public function __construct(string $url, bool $active = false) {
        $this->url = $url;
        $this->item_id = Str::after($url, '#');
        $this->active = $active;
    }

    /**
     * Get the view / contents that represents the component.
     */
    public function render(): Renderable {
        /**
         * @phpstan-var view-string
         */
        $view = 'theme::components.nav.tabs.content.item';
        $view_params = [
            'view' => $view,
        ];

        return view($view, $view_params);
    }
}
