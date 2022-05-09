<?php

declare(strict_types=1);

namespace Modules\Theme\View\Components\Profile\SummaryCard;

use Illuminate\Contracts\Support\Renderable;
use Modules\Xot\View\Components\XotBaseComponent;

/**
 * Class Item.
 * nb: funziona in directorybs5 ma non in adminlte.
 */
class Item extends XotBaseComponent {
    public function __construct() {
    }

    public function render(): Renderable {
        $view = 'theme::components.profile.summary_card.item';
        $view_params = [
            'view' => $view,
        ];

        return view()->make($view, $view_params);
    }
}
