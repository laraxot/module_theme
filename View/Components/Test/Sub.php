<?php

declare(strict_types=1);

namespace Modules\Theme\View\Components\Test;

use Illuminate\Contracts\View\View as ViewContract;
use Illuminate\View\Component;
use Illuminate\View\View;

/**
 * Class Sub.
 */
<<<<<<< HEAD
class Sub extends Component {
=======
class Sub extends Component
{
>>>>>>> ede0df7 (first)
    /**
     * Create a new component instance.
     *
     * @return void
     */
<<<<<<< HEAD
    public function __construct() {
=======
    public function __construct()
    {
>>>>>>> ede0df7 (first)
    }

    /**
     * Get the view / contents that represent the component.
     */
<<<<<<< HEAD
    public function render(): ViewContract {
=======
    public function render(): ViewContract
    {
>>>>>>> ede0df7 (first)
        return view()->make('components.forms.input');
    }
}
