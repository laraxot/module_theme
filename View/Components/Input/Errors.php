<?php

declare(strict_types=1);

namespace Modules\Theme\View\Components\Input;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\View\Component;

/**
 * Undocumented class.
 */
<<<<<<< HEAD
class Errors extends Component {
    /**
     * Undocumented function.
     */
    public function __construct() {
=======
class Errors extends Component
{
    /**
     * Undocumented function.
     */
    public function __construct()
    {
>>>>>>> ede0df7 (first)
    }

    /**
     * Get the view / contents that represents the component.
     */
<<<<<<< HEAD
    public function render(): Renderable {
=======
    public function render(): Renderable
    {
>>>>>>> ede0df7 (first)
        return view('theme::components.input.errors');
    }
}
