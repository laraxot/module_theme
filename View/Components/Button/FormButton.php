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

    public ?string $class;
    public ?string $style;
    public ?string $label;

    public function __construct(string $action, string $method, ?string $class = '', ?string $style = '', ?string $label = 'aggiungere label') {
        $this->action = $action;
        $this->method = strtoupper($method);
        $this->class = $class;
        $this->style = $style;
        $this->label = $label;
    }

    public function render(): View {
        return view()->make('theme::components.button.form-button');
    }
}
