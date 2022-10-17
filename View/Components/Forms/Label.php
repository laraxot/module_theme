<?php

declare(strict_types=1);

namespace Modules\Theme\View\Components\Forms;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Support\Str;
use Modules\Xot\View\Components\XotBaseComponent;

/**
 * Class Label.
 */
<<<<<<< HEAD
class Label extends XotBaseComponent {
    public string $for;

    public function __construct(string $for) {
        $this->for = $for;
    }

    public function render(): Renderable {
        /**
         * @phpstan-var view-string
         */
=======
class Label extends XotBaseComponent
{
    public string $for;

    public function __construct(string $for)
    {
        $this->for = $for;
    }

    public function render(): Renderable
    {
>>>>>>> ede0df7 (first)
        $view = 'theme::components.forms.label';

        return view()->make($view);
    }

<<<<<<< HEAD
    public function fallback(): string {
=======
    public function fallback(): string
    {
>>>>>>> ede0df7 (first)
        return Str::ucfirst(str_replace('_', ' ', $this->for));
    }
}
