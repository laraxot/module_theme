<<<<<<< HEAD
<?php

declare(strict_types=1);

namespace Modules\Theme\View\Components\Forms;

use Modules\Xot\View\Components\XotBaseComponent;
use Illuminate\Support\ViewErrorBag;
use Illuminate\View\View;

/**
 * Class Error
 * @package Modules\Theme\View\Components\Forms
 */
class Error extends XotBaseComponent
{
    /** @var string */
    public string $field;

    /** @var string */
    public string $bag;

    public function __construct(string $field, string $bag = 'default')
    {
        $this->field = $field;
        $this->bag = $bag;
    }

    public function render(): View
    {
        return view('theme::components.forms.error');
    }

    public function messages(ViewErrorBag $errors): array
    {
        $bag = $errors->getBag($this->bag);

        return $bag->has($this->field) ? $bag->get($this->field) : [];
    }
}
=======
<?php

declare(strict_types=1);

namespace Modules\Theme\View\Components\Forms;

use Illuminate\Support\ViewErrorBag;
use Illuminate\View\View;
use Modules\Xot\View\Components\XotBaseComponent;

/**
 * Class Error.
 */
class Error extends XotBaseComponent {
    /** @var string */
    public string $field;

    /** @var string */
    public string $bag;

    public function __construct(string $field, string $bag = 'default') {
        $this->field = $field;
        $this->bag = $bag;
    }

    public function render(): View {
        return view('theme::components.forms.error');
    }

    public function messages(ViewErrorBag $errors): array {
        $bag = $errors->getBag($this->bag);

        return $bag->has($this->field) ? $bag->get($this->field) : [];
    }
}
>>>>>>> 9f0111a33322bf5ce36bbb7187f5866a7193d90f
