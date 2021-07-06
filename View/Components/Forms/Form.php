<?php

declare(strict_types=1);

namespace Modules\Theme\View\Components\Forms;

use Illuminate\Contracts\View\View;
use Modules\Xot\View\Components\XotBaseComponent;

/**
 * Class Form.
 */
class Form extends XotBaseComponent {
    /** @var string */
    public string $action;

    /** @var string */
    public string $method;

    /** @var bool */
    public bool $hasFiles;

    public function __construct(string $action, string $method = 'POST', bool $hasFiles = false) {
        $this->action = $action;
        $this->method = strtoupper($method);
        $this->hasFiles = $hasFiles;
    }

    public function render(): View {
        return view('theme::components.forms.form');
    }
}