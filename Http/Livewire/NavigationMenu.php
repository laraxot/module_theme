<?php

declare(strict_types=1);

namespace Modules\Theme\Http\Livewire;

use Illuminate\Contracts\Support\Renderable;
use Livewire\Component;

<<<<<<< HEAD
class NavigationMenu extends Component {
=======
class NavigationMenu extends Component
{
>>>>>>> ede0df7 (first)
    /**
     * The component's listeners.
     *
     * @var array
     */
    protected $listeners = [
        'refresh-navigation-menu' => '$refresh',
    ];

<<<<<<< HEAD
    public function render(): Renderable {
=======
    public function render(): Renderable
    {
>>>>>>> ede0df7 (first)
        return view()->make('theme::navigation-menu');
    }
}
