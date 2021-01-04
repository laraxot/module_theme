<?php

declare(strict_types=1);

namespace Modules\Theme\View\Components\Navigation;

use Modules\Xot\View\Components\XotBaseComponent;
use Illuminate\Contracts\View\View;

class Dropdown extends XotBaseComponent
{
    protected static $assets = ['alpine'];

    public function render(): View
    {
        return view('theme::components.navigation.dropdown');
    }
}
