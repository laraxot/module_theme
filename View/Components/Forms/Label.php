<?php

declare(strict_types=1);

namespace Modules\Theme\View\Components\Forms;

use Modules\Xot\View\Components\XotBaseComponent;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Str;

class Label extends XotBaseComponent
{
    /** @var string */
    public $for;

    public function __construct(string $for)
    {
        $this->for = $for;
    }

    public function render(): View
    {
        return view('theme::components.forms.label');
    }

    public function fallback(): string
    {
        return Str::ucfirst(str_replace('_', ' ', $this->for));
    }
}
