<?php

declare(strict_types=1);

namespace Modules\Theme\Http\Livewire\Carousel;

use Illuminate\Contracts\Support\Renderable;
use Livewire\Component;

/**
 * Undocumented class.
 */
class WithTimeframes extends Component
{
    public int $press_id;
    public string $type = 'v1';
    public array $items;
    public int $i = 0;
    public bool $showBtnLink;

    public string $component_id;

    /**
     * Undocumented function.
     */
    public function mount(string $component_id, array $items, ?bool $showBtnLink = true, ?string $type = 'v1'): void
    {
        $this->items = $items;
        $this->showBtnLink = $showBtnLink;
        $this->type = $type;
        $this->component_id = $component_id;

        // dddx($this->items);
    }

    /**
     * Undocumented function.
     */
    public function render(): Renderable
    {
        /**
         * @phpstan-var view-string
         */
        $view = 'theme::livewire.carousel.carousel.'.$this->type;

        $view_params = [
            'view' => $view,
        ];

        return view()->make($view, $view_params);
    }

    public function next()
    {
        ++$this->i;
        // $this->emit('getFrameSecond', $this->component_id, $this->items[$this->i]['start']);
    }

    public function prev()
    {
        --$this->i;
        // $this->emit('getFrameSecond', $this->component_id, $this->items[$this->i]['start']);
    }
}
