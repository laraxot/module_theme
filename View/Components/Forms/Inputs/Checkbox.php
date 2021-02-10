<?php

declare(strict_types=1);

namespace Modules\Theme\View\Components\Forms\Inputs;

use Illuminate\Contracts\View\View;

/**
 * Class Checkbox
 * @package Modules\Theme\View\Components\Forms\Inputs
 */
class Checkbox extends Input
{
    /** @var bool */
    public bool $checked;

    public function __construct(string $name, string $id = null, bool $checked = false)
    {
        parent::__construct($name, $id, 'checkbox');

        $this->checked = (bool) old($name, $checked);
    }

    public function render(): View
    {
        return view('theme::components.forms.inputs.checkbox');
    }
}
