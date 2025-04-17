<?php

declare(strict_types=1);

namespace Modules\Theme\Http\Livewire;

use Illuminate\Contracts\Support\Renderable;
use Livewire\Component;

/**
 * Undocumented class.
 */
class Accordion extends Component
{
    public string $show;
    public string $type;

    /**
     * Undocumented function.
     */
    public function mount(?string $type = 'v1'): void
    {
        $this->show = '';
        $this->type = $type;
    }

    /**
     * Undocumented function.
     */
    public function render(): Renderable
    {
        /**
         * @phpstan-var view-string
         */
        $view = 'theme::livewire.accordion.'.$this->type;

        $view_params = [
            'view' => $view,
        ];

        return view()->make($view, $view_params);
    }

    public function toggle()
    {
        if ('' === $this->show) {
            $this->show = 'show';
        } else {
            $this->show = '';
        }
    }
}
