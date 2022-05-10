<?php

declare(strict_types=1);

namespace Modules\Theme\View\Components\Forms;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Support\ViewErrorBag;
use Modules\Xot\View\Components\XotBaseComponent;

/**
 * Class Error.
 */
class Error extends XotBaseComponent {
    public string $field;

    public string $bag;

    public function __construct(string $field, string $bag = 'default') {
        $this->field = $field;
        $this->bag = $bag;
    }

    public function render(): Renderable {
        $view = 'theme::components.forms.error';

        return view()->make($view);
    }

    public function messages(ViewErrorBag $errors): array {
        $bag = $errors->getBag($this->bag);

        return $bag->has($this->field) ? $bag->get($this->field) : [];
    }
}
