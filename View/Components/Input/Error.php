<?php

declare(strict_types=1);

namespace Modules\Theme\View\Components\Input;

use Illuminate\View\Component;

<<<<<<< HEAD
class Error extends Component {
=======
class Error extends Component
{
>>>>>>> ede0df7 (first)
    public string $for;

    /**
     * Undocumented function.
     */
<<<<<<< HEAD
    public function __construct(string $for) {
=======
    public function __construct(string $for)
    {
>>>>>>> ede0df7 (first)
        $this->for = $for;
    }

    /**
     * Get the view / contents that represents the component.
     */
<<<<<<< HEAD
    public function render(): \Illuminate\Contracts\Support\Renderable {
=======
    public function render():\Illuminate\Contracts\Support\Renderable
    {
>>>>>>> ede0df7 (first)
        return view('theme::components.input.error');
    }
}
