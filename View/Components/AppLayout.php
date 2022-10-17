<?php

declare(strict_types=1);

namespace Modules\Theme\View\Components;

use Illuminate\View\Component;

<<<<<<< HEAD
class AppLayout extends Component {
    /**
     * Get the view / contents that represents the component.
     */
    public function render(): \Illuminate\Contracts\Support\Renderable {
=======
class AppLayout extends Component
{
    /**
     * Get the view / contents that represents the component.
     */
    public function render():\Illuminate\Contracts\Support\Renderable
    {
>>>>>>> ede0df7 (first)
        return view('pub_theme::layouts.app');
    }
}
