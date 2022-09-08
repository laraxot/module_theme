<?php

declare(strict_types=1);
// -- in module/theme

namespace Modules\Theme\View\Components\Promo;

use Illuminate\View\Component;

/**
 * Undocumented class.
 */
class CounterItem extends Component {
    public int $counter;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(int $counter) {
        $this->counter = $counter;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render() {
        return view()->make('theme::components.promo.counter-item');
    }
}
