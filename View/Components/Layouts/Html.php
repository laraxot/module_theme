<<<<<<< HEAD
<?php

declare(strict_types=1);

namespace Modules\Theme\View\Components\Layouts;

use Modules\Xot\View\Components\XotBaseComponent;
use Illuminate\Contracts\View\View;

/**
 * Class Html
 * @package Modules\Theme\View\Components\Layouts
 */
class Html extends XotBaseComponent
{
    /** @var string */
    protected string $title;

    public function __construct(string $title = '')
    {
        $this->title = $title;
    }

    public function render(): View
    {
        return view('theme::components.layouts.html');
    }

    public function title(): string
    {
        return $this->title ?: (string) config('app.name', 'Laravel');
    }
}
=======
<?php

declare(strict_types=1);

namespace Modules\Theme\View\Components\Layouts;

use Illuminate\Contracts\View\View;
use Modules\Xot\View\Components\XotBaseComponent;

/**
 * Class Html.
 */
class Html extends XotBaseComponent {
    /** @var string */
    protected string $title;

    public function __construct(string $title = '') {
        $this->title = $title;
    }

    public function render(): View {
        return view('theme::components.layouts.html');
    }

    public function title(): string {
        return $this->title ?: (string) config('app.name', 'Laravel');
    }
}
>>>>>>> 9f0111a33322bf5ce36bbb7187f5866a7193d90f
