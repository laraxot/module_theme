<?php

declare(strict_types=1);

namespace Modules\Theme\Http\Livewire\Sort;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Support\Collection;
use Livewire\Component;
use Modules\Xot\Contracts\PanelContract;
use Modules\Xot\Services\PanelService;

/**
 * Class Sort/Collection.
 *
 */
class Coll extends Component {
    public Collection $data;

    /**
     * Undocumented function
     *
     * @param [type] $data
     * @return void
     */
    public function mount($data){ 
        $this->data = $data;
    }

    /**
     * Undocumented function
     *
     * @return Renderable
     */
    public function render():Renderable{
        return view('theme::livewire.sort.coll');
    }

}