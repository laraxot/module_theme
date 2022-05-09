<?php

declare(strict_types=1);

namespace Modules\Theme\View\Components\Select\Order\Time;

use Illuminate\View\Component;

/**
 * Class Dialog.
 */
class Dialog extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render():\Illuminate\Contracts\Support\Renderable
    {
        return view()->make('pub_theme::components.select.order.time.dialog');
    }
}
