<?php

declare(strict_types=1);

namespace Modules\Theme\View\Components\PricingCard;

use Illuminate\Contracts\Support\Renderable;
use Modules\Xot\View\Components\XotBaseComponent;

/**
 * Class Container.
 * nb: funziona in directorybs5 ma non in adminlte.
 */
class Item extends XotBaseComponent {
    public array $attrs;

    public function __construct(string $id, string $checked = 'true') {
        $this->attrs['id'] = $id;
        $this->attrs['checked'] = $checked;
    }

    public function render(): Renderable {
        /** 
        * @phpstan-var view-string
        */
        $view = 'theme::components.pricing_card.item';
        $view_params = [
            'view' => $view,
        ];

        return view()->make($view, $view_params);
    }
}
