<?php

declare(strict_types=1);

namespace Modules\Theme\View\Components\Test;

use Illuminate\Contracts\View\View as ViewContract;
use Illuminate\View\Component;
use Illuminate\View\View;

/**
 * Class Sub.
 */
class Sub extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): ViewContract
    {
        return view()->make('components.forms.input');
    }
}
