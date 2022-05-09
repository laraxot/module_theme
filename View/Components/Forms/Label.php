<?php

declare(strict_types=1);

namespace Modules\Theme\View\Components\Forms;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Support\Str;
use Modules\Xot\View\Components\XotBaseComponent;

/**
 * Class Label.
 */
class Label extends XotBaseComponent
{
    public string $for;

    public function __construct(string $for)
    {
        $this->for = $for;
    }

    public function render(): Renderable
    {
        $view = 'theme::components.forms.label';

        return view()->make($view);
    }

    public function fallback(): string
    {
        return Str::ucfirst(str_replace('_', ' ', $this->for));
    }
}
