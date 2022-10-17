<?php

declare(strict_types=1);

namespace Modules\Theme\View\Components;

use Illuminate\View\Component;

/**
 * Class Col.
 */
<<<<<<< HEAD
class Col extends Component {
=======
class Col extends Component
{
>>>>>>> ede0df7 (first)
    public int $size;

    /**
     * Create a new component instance.
     *
     * @return void
     */
<<<<<<< HEAD
    public function __construct(int $size) {
        $this->size = $size;
        // /if(config('adm_theme::config.ghjisd')=='bootstrap'){
        //    $class
        // }
=======
    public function __construct(int $size)
    {
        $this->size = $size;
        ///if(config('adm_theme::config.ghjisd')=='bootstrap'){
        //    $class
        //}
>>>>>>> ede0df7 (first)
    }

    /**
     * Get the view / contents that represent the component.
     */
<<<<<<< HEAD
    public function render(): \Illuminate\Contracts\Support\Renderable {
=======
    public function render():\Illuminate\Contracts\Support\Renderable
    {
>>>>>>> ede0df7 (first)
        return view()->make('theme::components.col');
    }
}
