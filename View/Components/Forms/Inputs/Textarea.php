<?php

declare(strict_types=1);

namespace Modules\Theme\View\Components\Forms\Inputs;

use Modules\Xot\View\Components\XotBaseComponent;
use Illuminate\Contracts\View\View;

class Textarea extends XotBaseComponent
{
    /** @var string */
    public $name;

    /** @var string */
    public $id;

    /** @var int */
    public $rows;

    public function __construct(string $name, string $id = null, $rows = 3)
    {
        $this->name = $name;
        $this->id = $id ?? $name;
        $this->rows = $rows;
    }

    public function render(): View
    {
        return view('theme::components.forms.inputs.textarea');
    }
}
