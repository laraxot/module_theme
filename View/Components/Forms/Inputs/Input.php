<<<<<<< HEAD
<?php

declare(strict_types=1);

namespace Modules\Theme\View\Components\Forms\Inputs;

use Modules\Xot\View\Components\XotBaseComponent;
use Illuminate\Contracts\View\View;

/**
 * Class Input
 * @package Modules\Theme\View\Components\Forms\Inputs
 */
class Input extends XotBaseComponent
{
    /** @var string */
    public ?string $name;

    /** @var string */
    public string $id;

    /** @var string */
    public string $type;

    /** @var string */
    public $value;

    public function __construct(string $name, string $id = null, string $type = 'text', ?string $value = '')
    {
        $this->name = $name;
        $this->id = $id ?? $name;
        $this->type = $type;
        $this->value = old($name, $value ?? '');
    }

    public function render(): View
    {
        return view('theme::components.forms.inputs.input');
    }
}
=======
<?php

declare(strict_types=1);

namespace Modules\Theme\View\Components\Forms\Inputs;

use Illuminate\Contracts\View\View;
use Modules\Xot\View\Components\XotBaseComponent;

/**
 * Class Input.
 */
class Input extends XotBaseComponent {
    /** @var string */
    public ?string $name;

    /** @var string */
    public string $id;

    /** @var string */
    public string $type;

    /** @var string */
    public $value;

    public function __construct(string $name, string $id = null, string $type = 'text', ?string $value = '') {
        $this->name = $name;
        $this->id = $id ?? $name;
        $this->type = $type;
        $this->value = old($name, $value ?? '');
    }

    public function render(): View {
        return view('theme::components.forms.inputs.input');
    }
}
>>>>>>> 9f0111a33322bf5ce36bbb7187f5866a7193d90f
