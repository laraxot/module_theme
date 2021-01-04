<?php

declare(strict_types=1);

namespace Modules\Theme\View\Components\Forms\Inputs;

use Illuminate\Contracts\View\View;

class Email extends Input
{
    public function __construct(string $name = 'email', string $id = null, ?string $value = '')
    {
        parent::__construct($name, $id, 'email', $value);
    }

    public function render(): View
    {
        return view('theme::components.forms.inputs.email');
    }
}
