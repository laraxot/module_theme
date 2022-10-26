<?php

declare(strict_types=1);

namespace Modules\Theme\View\Components\Navigation;

use Illuminate\Contracts\View\View;
use Modules\Xot\View\Components\XotBaseComponent;

/**
 * Class Dropdown.
 */
class Dropdown extends XotBaseComponent {
    /**
     * @var string[]
     */
    protected static array $assets = ['alpine'];

    public function render(): View {
        return view()->make('theme::components.navigation.dropdown');
    }
}
