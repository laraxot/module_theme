<?php

declare(strict_types=1);

namespace Modules\Theme\View\Components\Forms\Inputs;

use Illuminate\Contracts\Support\Renderable;

/**
 * Class Password.
 */
class Password extends Input
{
    public function __construct(string $name = 'password', string $id = null)
    {
        parent::__construct($name, $id, 'password');
    }

    public function render(): Renderable
    {
        $view = 'theme::components.forms.inputs.password';

        return view()->make($view);
    }
}
