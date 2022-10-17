<?php

declare(strict_types=1);

namespace Modules\Theme\View\Components\Button;

use Illuminate\Contracts\View\View;
use Modules\Xot\View\Components\XotBaseComponent;

/**
 * Class FormButton.
 */
<<<<<<< HEAD
class FormButton extends XotBaseComponent {
=======
class FormButton extends XotBaseComponent
{
>>>>>>> ede0df7 (first)
    public string $action;

    public string $method;

<<<<<<< HEAD
    public function __construct(string $action, string $method = 'POST') {
=======
    public function __construct(string $action, string $method = 'POST')
    {
>>>>>>> ede0df7 (first)
        $this->action = $action;
        $this->method = strtoupper($method);
    }

<<<<<<< HEAD
    public function render(): View {
=======
    public function render(): View
    {
>>>>>>> ede0df7 (first)
        return view()->make('theme::components.button.form-button');
    }
}
