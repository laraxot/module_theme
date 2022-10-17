<?php

declare(strict_types=1);

namespace Modules\Theme\View\Components\Navbar;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\View\Component;

/**
 * Item.
 */
<<<<<<< HEAD
class Item extends Component {
    public bool $active;
    public string $href;

    public function __construct(string $href, bool $active) {
=======
class Item extends Component
{
    public bool $active;
    public string $href;

    public function __construct(string $href, bool $active)
    {
>>>>>>> ede0df7 (first)
        $this->href = $href;
        $this->active = $active;
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
        return view('theme::components.navbar.item');
    }
}
