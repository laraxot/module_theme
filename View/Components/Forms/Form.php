<?php

declare(strict_types=1);

namespace Modules\Theme\View\Components\Forms;

use Illuminate\Contracts\Support\Renderable;
use Modules\Xot\View\Components\XotBaseComponent;

/**
 * Class Form.
 */
class Form extends XotBaseComponent {
    public string $action;

    public string $method;

    public bool $hasFiles;

    public function __construct(string $action, string $method = 'POST', bool $hasFiles = false) {
        $this->action = $action;
        $this->method = strtoupper($method);
        $this->hasFiles = $hasFiles;
    }

    public function render(): Renderable {
        /**
         * @phpstan-var view-string
         */
        $view = 'theme::components.forms.form';

        return view()->make($view);
    }
}
