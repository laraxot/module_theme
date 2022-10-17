<?php

declare(strict_types=1);

namespace Modules\Theme\View\Components\Button;

use Illuminate\Contracts\View\View;
use Modules\Xot\View\Components\XotBaseComponent;

/**
 * Class FormButton.
 */
class FormButton extends XotBaseComponent {
    public string $action;

    public string $method;

    public function __construct(string $action, string $method = 'POST') {
        $this->action = $action;
        $this->method = strtoupper($method);
    }

    public function render(): View {
        return view()->make('theme::components.button.form-button');
    }
}
