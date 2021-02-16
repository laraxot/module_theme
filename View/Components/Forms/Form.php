<<<<<<< HEAD
<?php

declare(strict_types=1);

namespace Modules\Theme\View\Components\Forms;

use Modules\Xot\View\Components\XotBaseComponent;
use Illuminate\Contracts\View\View;

/**
 * Class Form
 * @package Modules\Theme\View\Components\Forms
 */
class Form extends XotBaseComponent
{
    /** @var string */
    public string $action;

    /** @var string */
    public string $method;

    /** @var bool */
    public bool $hasFiles;

    public function __construct(string $action, string $method = 'POST', bool $hasFiles = false)
    {
        $this->action = $action;
        $this->method = strtoupper($method);
        $this->hasFiles = $hasFiles;
    }

    public function render(): View
    {
        return view('theme::components.forms.form');
    }
}
=======
<?php

declare(strict_types=1);

namespace Modules\Theme\View\Components\Forms;

use Modules\Xot\View\Components\XotBaseComponent;
use Illuminate\Contracts\View\View;

/**
 * Class Form
 * @package Modules\Theme\View\Components\Forms
 */
class Form extends XotBaseComponent
{
    /** @var string */
    public string $action;

    /** @var string */
    public string $method;

    /** @var bool */
    public bool $hasFiles;

    public function __construct(string $action, string $method = 'POST', bool $hasFiles = false)
    {
        $this->action = $action;
        $this->method = strtoupper($method);
        $this->hasFiles = $hasFiles;
    }

    public function render(): View
    {
        return view('theme::components.forms.form');
    }
}
>>>>>>> a83164a (first)
