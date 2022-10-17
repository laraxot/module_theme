<?php

declare(strict_types=1);

namespace Modules\Theme\Http\Livewire\Sort;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Support\Collection;
use Livewire\Component;
<<<<<<< HEAD

/**
 * Class Sort/Collection.
=======
use Modules\Xot\Contracts\PanelContract;
use Modules\Xot\Services\PanelService;

/**
 * Class Sort/Collection.
 *
>>>>>>> bbaedf0 (.)
 */
class Coll extends Component {
    public Collection $data;

    /**
<<<<<<< HEAD
     * Undocumented function.
     *
     * @param Collection $data
     *
     * @return void
     */
    public function mount($data) {
=======
     * Undocumented function
     *
     * @param [type] $data
     * @return void
     */
    public function mount($data){ 
>>>>>>> bbaedf0 (.)
        $this->data = $data;
    }

    /**
<<<<<<< HEAD
     * Undocumented function.
     */
    public function render(): Renderable {
        /**
         * @phpstan-var view-string
         */
        $view = 'theme::livewire.sort.coll';
        $view_params = [];

        return view($view, $view_params);
    }
}
=======
     * Undocumented function
     *
     * @return Renderable
     */
    public function render():Renderable{
        return view('theme::livewire.sort.coll');
    }

}
>>>>>>> bbaedf0 (.)
