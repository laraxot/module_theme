<<<<<<< HEAD
<?php

declare(strict_types=1);

namespace Modules\Theme\View\Components\Forms\Inputs;

use Illuminate\Contracts\View\View;

/**
 * Class Password
 * @package Modules\Theme\View\Components\Forms\Inputs
 */
class Password extends Input
{
    public function __construct(string $name = 'password', string $id = null)
    {
        parent::__construct($name, $id, 'password');
    }

    public function render(): View
    {
        return view('theme::components.forms.inputs.password');
    }
}
=======
<?php

declare(strict_types=1);

namespace Modules\Theme\View\Components\Forms\Inputs;

use Illuminate\Contracts\View\View;

/**
 * Class Password.
 */
class Password extends Input {
    public function __construct(string $name = 'password', string $id = null) {
        parent::__construct($name, $id, 'password');
    }

    public function render(): View {
        return view('theme::components.forms.inputs.password');
    }
}
>>>>>>> 9f0111a33322bf5ce36bbb7187f5866a7193d90f
