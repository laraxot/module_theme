<?php

declare(strict_types=1);

namespace Modules\Theme\View\Components\Nav\Tabs\Content;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\View\Component;

/**
 * Container.
 */
class Container extends Component {
    /**
     * --.
     */
    public function __construct() {
    }

    /**
     * Get the view / contents that represents the component.
     */
    public function render(): Renderable {
        return view('theme::components.nav.tabs.content.container');
    }
}
