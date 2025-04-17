<?php

declare(strict_types=1);

/* <script src="//app.dev:6001/socket.io/socket.io.js"></script> */

declare(strict_types=1);

namespace Modules\Theme\View\Components;

use Illuminate\View\Component;

/**
 * Class Chat.
 */
class Chat extends Component
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
    public function render(): \Illuminate\Contracts\Support\Renderable
    {
        return view()->make('theme::components.chat');
    }
}
