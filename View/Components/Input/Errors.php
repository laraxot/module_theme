<?php

declare(strict_types=1);

namespace Modules\Theme\View\Components\Input;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\View\Component;

/**
 * Undocumented class.
 */
class Errors extends Component
{
    /**
     * Undocumented function.
     */
    public function __construct()
    {
    }

    /**
     * Get the view / contents that represents the component.
     */
    public function render(): Renderable
    {
        return view('theme::components.input.errors');
    }
}
