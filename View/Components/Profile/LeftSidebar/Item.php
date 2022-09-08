<?php

declare(strict_types=1);

namespace Modules\Theme\View\Components\Profile\LeftSidebar;

use Illuminate\Contracts\Support\Renderable;
use Modules\Xot\View\Components\XotBaseComponent;

/**
 * Class Item.
 * nb: funziona in directorybs5 ma non in adminlte.
 */
class Item extends XotBaseComponent {
    public ?string $active;
    public ?string $icon;

    public function __construct(?string $active = '', ?string $icon = 'fa-user') {
        $this->active = $active;
        $this->icon = $icon;
    }

    public function render(): Renderable {
        /**
         * @phpstan-var view-string
         */
        $view = 'theme::components.profile.left-sidebar.item';
        $view_params = [
            // 'active' => $this->active,
            // 'icon' => $this->icon,
            'view' => $view,
        ];

        return view()->make($view, $view_params);
    }
}
