<?php

declare(strict_types=1);

namespace Modules\Theme\View\Components\Forms\Inputs;

use Illuminate\Contracts\Support\Renderable;

/**
 * Class Email.
 */
<<<<<<< HEAD
class Email extends Input {
    public function __construct(string $name = 'email', string $id = null, ?string $value = '') {
        parent::__construct($name, $id, 'email', $value);
    }

    public function render(): Renderable {
=======
class Email extends Input
{
    public function __construct(string $name = 'email', string $id = null, ?string $value = '')
    {
        parent::__construct($name, $id, 'email', $value);
    }

    public function render(): Renderable
    {
>>>>>>> ede0df7 (first)
        $view = 'theme::components.forms.inputs.email';

        return view()->make($view);
    }
}
