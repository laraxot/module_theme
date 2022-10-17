<?php

declare(strict_types=1);

namespace Modules\Theme\View\Components\Forms;

use Illuminate\Contracts\Support\Renderable;
use Modules\Xot\View\Components\XotBaseComponent;

/**
 * Class Form.
 */
<<<<<<< HEAD
class Form extends XotBaseComponent {
=======
class Form extends XotBaseComponent
{
>>>>>>> ede0df7 (first)
    public string $action;

    public string $method;

    public bool $hasFiles;

<<<<<<< HEAD
    public function __construct(string $action, string $method = 'POST', bool $hasFiles = false) {
=======
    public function __construct(string $action, string $method = 'POST', bool $hasFiles = false)
    {
>>>>>>> ede0df7 (first)
        $this->action = $action;
        $this->method = strtoupper($method);
        $this->hasFiles = $hasFiles;
    }

<<<<<<< HEAD
    public function render(): Renderable {
        /**
         * @phpstan-var view-string
         */
=======
    public function render(): Renderable
    {
>>>>>>> ede0df7 (first)
        $view = 'theme::components.forms.form';

        return view()->make($view);
    }
}
