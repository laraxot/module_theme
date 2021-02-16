<<<<<<< HEAD
<?php

declare(strict_types=1);

namespace Modules\Theme\View\Components\Buttons;

use Modules\Xot\View\Components\XotBaseComponent;
use Illuminate\Contracts\View\View;

/**
 * Class FormButton
 * @package Modules\Theme\View\Components\Buttons
 */
class FormButton extends XotBaseComponent
{
    /** @var string */
    public string $action;

    /** @var string */
    public string $method;

    public function __construct(string $action, string $method = 'POST')
    {
        $this->action = $action;
        $this->method = strtoupper($method);
    }

    public function render(): View
    {
        return view('theme::components.buttons.form-button');
    }
}
=======
<?php

declare(strict_types=1);

namespace Modules\Theme\View\Components\Buttons;

use Modules\Xot\View\Components\XotBaseComponent;
use Illuminate\Contracts\View\View;

/**
 * Class FormButton
 * @package Modules\Theme\View\Components\Buttons
 */
class FormButton extends XotBaseComponent
{
    /** @var string */
    public string $action;

    /** @var string */
    public string $method;

    public function __construct(string $action, string $method = 'POST')
    {
        $this->action = $action;
        $this->method = strtoupper($method);
    }

    public function render(): View
    {
        return view('theme::components.buttons.form-button');
    }
}
>>>>>>> a83164a (first)
