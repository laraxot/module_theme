<?php

declare(strict_types=1);

namespace Modules\Theme\Http\Livewire;

use Illuminate\Contracts\Support\Renderable;
use Livewire\Component;

/**
 * Undocumented class.
 */
class Carousel extends Component {
    public string $type = 'carousel';
    public array $items;
    public int $i = 0;

    /**
     * Undocumented function.
     */
    public function mount(array $items): void {
        $this->items = $items;
    }

    /**
     * Undocumented function.
     */
    public function render(): Renderable {
        /**
         * @phpstan-var view-string
         */
        $view = 'theme::livewire.carousel.'.$this->type;

        $view_params = [
            'view' => $view,
        ];

        return view()->make($view, $view_params);
    }

    public function next() {
        ++$this->i;
    }

    public function prev() {
        --$this->i;
    }
}
