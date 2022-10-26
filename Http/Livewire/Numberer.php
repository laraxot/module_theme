<?php

declare(strict_types=1);

namespace Modules\Theme\Http\Livewire;

use Illuminate\Contracts\Support\Renderable;
use Livewire\Component;

/**
 * Class Numberer.
 */
class Numberer extends Component
{
    public string $excrement = 'poop';

    public int $count;

    /**
     * Undocumented function.
     */
    public function mount(): void
    {
        $this->count = 0;
    }

    /**
     * Render the component.
     */
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
        --$this->count;
    }
}
