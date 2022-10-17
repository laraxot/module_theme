<?php

declare(strict_types=1);

namespace Modules\Theme\View\Components\Navigation;

use Illuminate\Contracts\View\View;
use Modules\Xot\View\Components\XotBaseComponent;

/**
 * Class Dropdown.
 */
<<<<<<< HEAD
class Dropdown extends XotBaseComponent {
=======
class Dropdown extends XotBaseComponent
{
>>>>>>> ede0df7 (first)
    /**
     * @var string[]
     */
    protected static array $assets = ['alpine'];

<<<<<<< HEAD
    public function render(): View {
=======
    public function render(): View
    {
>>>>>>> ede0df7 (first)
        return view()->make('theme::components.navigation.dropdown');
    }
}
