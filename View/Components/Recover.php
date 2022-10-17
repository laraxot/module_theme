<?php

declare(strict_types=1);

namespace Modules\Theme\View\Components;

use Illuminate\View\Component;

/**
 * Class Recover.
 */
<<<<<<< HEAD
class Recover extends Component {
=======
class Recover extends Component
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
    public function render(): \Illuminate\Contracts\Support\Renderable {
=======
    public function render():\Illuminate\Contracts\Support\Renderable
    {
>>>>>>> ede0df7 (first)
        return view()->make('pub_theme::components.recover');
    }
}
