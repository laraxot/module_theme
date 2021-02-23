<<<<<<< HEAD
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
=======
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
        return view('theme::components.navigation.dropdown');
    }
}
>>>>>>> 9f0111a33322bf5ce36bbb7187f5866a7193d90f
