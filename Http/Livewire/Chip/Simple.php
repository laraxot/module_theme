<?php

declare(strict_types=1);

namespace Modules\Theme\Http\Livewire\Chip;

use Livewire\Component;

<<<<<<< HEAD
class Simple extends Component {
    /* public $row; */
    public mixed $elements;
    public string $tag = 'test';

=======
class Simple extends Component
{
    /*public $row;*/
    public mixed $elements;
    public string $tag = 'test';


>>>>>>> ede0df7 (first)
    /*public function mount($row, $name):void {

    }*/

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    /**
     * Render the component.
<<<<<<< HEAD
     */
    public function render(): \Illuminate\Contracts\Support\Renderable {
        /**
         * @phpstan-var view-string
         */
=======
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function render():\Illuminate\Contracts\Support\Renderable
    {
>>>>>>> ede0df7 (first)
        $view = 'theme::livewire.chip.simple';

        $view_params = [
            'view' => $view,
            'elements' => $this->elements,
        ];

        return view()->make($view, $view_params);
    }

<<<<<<< HEAD
    public function add(): void {
=======
    public function add():void
    {
>>>>>>> ede0df7 (first)
        dddx(['preso']);
    }
}
