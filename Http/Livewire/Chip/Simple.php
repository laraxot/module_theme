<?php

declare(strict_types=1);

namespace Modules\Theme\Http\Livewire\Chip;

use Livewire\Component;

class Simple extends Component
{
    /*public $row;*/
    public mixed $elements;
    public string $tag = 'test';


    /*public function mount($row, $name):void {

    }*/

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    /**
     * Render the component.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function render():\Illuminate\Contracts\Support\Renderable
    {
        $view = 'theme::livewire.chip.simple';

        $view_params = [
            'view' => $view,
            'elements' => $this->elements,
        ];

        return view()->make($view, $view_params);
    }

    public function add():void
    {
        dddx(['preso']);
    }
}
