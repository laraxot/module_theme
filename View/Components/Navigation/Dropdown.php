<?php

declare(strict_types=1);

namespace Modules\Theme\Views\Components\Navigation;

use Modules\Xot\Views\Components\XotBaseComponent;
use Illuminate\Contracts\View\View;

class Dropdown extends XotBaseComponent
{
    protected static $assets = ['alpine'];

    public function render(): View
    {
        return view('theme::components.navigation.dropdown');
    }
}
