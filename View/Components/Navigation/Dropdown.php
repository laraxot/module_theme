<?php

declare(strict_types=1);

namespace Modules\Theme\View\Components\Navigation;

use Modules\Xot\View\Components\XotBaseComponent;
use Illuminate\Contracts\View\View;

/**
 * Class Dropdown
 * @package Modules\Theme\View\Components\Navigation
 */
class Dropdown extends XotBaseComponent
{
    /**
     * @var string[]
     */
    protected static array $assets = ['alpine'];

    public function render(): View
    {
        return view('theme::components.navigation.dropdown');
    }
}
