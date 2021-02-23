<<<<<<< HEAD
<?php

declare(strict_types=1);

namespace Modules\Theme\View\Components\Forms\Inputs;

use Illuminate\Contracts\View\View;

/**
 * Class Email
 * @package Modules\Theme\View\Components\Forms\Inputs
 */
class Email extends Input
{
    public function __construct(string $name = 'email', string $id = null, ?string $value = '')
    {
        parent::__construct($name, $id, 'email', $value);
    }

    public function render(): View
    {
        return view('theme::components.forms.inputs.email');
    }
}
=======
<?php

declare(strict_types=1);

namespace Modules\Theme\View\Components\Forms\Inputs;

use Illuminate\Contracts\View\View;

/**
 * Class Email.
 */
class Email extends Input {
    public function __construct(string $name = 'email', string $id = null, ?string $value = '') {
        parent::__construct($name, $id, 'email', $value);
    }

    public function render(): View {
        return view('theme::components.forms.inputs.email');
    }
}
>>>>>>> 9f0111a33322bf5ce36bbb7187f5866a7193d90f
