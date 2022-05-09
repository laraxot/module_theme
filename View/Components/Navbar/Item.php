<?php

declare(strict_types=1);

namespace Modules\Theme\View\Components\Navbar;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\View\Component;

/**
 * Item.
 */
class Item extends Component
{
    public bool $active;
    public string $href;

    public function __construct(string $href, bool $active)
    {
        $this->href = $href;
        $this->active = $active;
    }

    /**
     * Get the view / contents that represents the component.
     */
    public function render(): Renderable
    {
        return view('theme::components.navbar.item');
    }
}
