<?php

declare(strict_types=1);

namespace Modules\Theme\View\Components\PricingCard;

use Illuminate\Contracts\Support\Renderable;
use Modules\Xot\View\Components\XotBaseComponent;

/**
 * Class Container.
 * nb: funziona in directorybs5 ma non in adminlte.
 */
class Container extends XotBaseComponent {
    public array $attrs;

<<<<<<< HEAD
    public function __construct(
        string $id,
        string $title = '',
        string $price = '$ 0.00',
        string $period = 'month',
        string $highlight = 'false'
    ) {
=======
    public function __construct(string $id, string $title = '', string $price = '$ 0.00',
    string $period = 'month', string $highlight = 'false') {
>>>>>>> ede0df7 (first)
        $this->attrs['id'] = $id;
        $this->attrs['title'] = $title;
        $this->attrs['price'] = $price;
        $this->attrs['period'] = $period;
        $this->attrs['highlight'] = $highlight;
    }

    public function render(): Renderable {
<<<<<<< HEAD
        /**
         * @phpstan-var view-string
         */
=======
>>>>>>> ede0df7 (first)
        $view = 'theme::components.pricing_card.container';
        $view_params = [
            'view' => $view,
        ];

        return view()->make($view, $view_params);
    }
}
