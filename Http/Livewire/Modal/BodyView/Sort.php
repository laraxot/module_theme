<?php

declare(strict_types=1);

namespace Modules\Theme\Http\Livewire\Modal\BodyView;

<<<<<<< HEAD
use Illuminate\Support\Collection;
=======
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Support\Collection;
use Livewire\Component;
use Modules\Xot\Contracts\PanelContract;
use Modules\Xot\Services\PanelService;

>>>>>>> bbaedf0 (.)
use Modules\Theme\Http\Livewire\Modal\BodyView as BaseComponent;

/**
 * Class Sort/Collection.
<<<<<<< HEAD
 */
class Sort extends BaseComponent {
    public function updateTaskOrder(array $list): void {
        dddx($list);
    }
}
=======
 *
 */
class Sort extends BaseComponent {
    
    /**
     * 
     */
    public function updateTaskOrder(array $list):void {
        dddx($list);
    }

}
>>>>>>> bbaedf0 (.)
