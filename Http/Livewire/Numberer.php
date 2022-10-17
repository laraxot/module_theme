<?php

declare(strict_types=1);

namespace Modules\Theme\Http\Livewire;

use Illuminate\Contracts\Support\Renderable;
use Livewire\Component;

/**
 * Class Numberer.
 */
<<<<<<< HEAD
class Numberer extends Component {
=======
class Numberer extends Component
{
>>>>>>> ede0df7 (first)
    public string $excrement = 'poop';

    public int $count;

    /**
     * Undocumented function.
     */
<<<<<<< HEAD
    public function mount(): void {
=======
    public function mount(): void
    {
>>>>>>> ede0df7 (first)
        $this->count = 0;
    }

    /**
     * Render the component.
     */
<<<<<<< HEAD
    public function render(): Renderable {
        return view()->make('theme::livewire.numberer');
    }

    public function increment(): void {
        ++$this->count;
    }

    public function decrement(): void {
=======
    public function render(): Renderable
    {
        return view()->make('theme::livewire.numberer');
    }

    public function increment(): void
    {
        ++$this->count;
    }

    public function decrement(): void
    {
>>>>>>> ede0df7 (first)
        --$this->count;
    }
}
