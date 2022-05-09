<?php

declare(strict_types=1);

namespace Modules\Theme\Http\Livewire\Modal\BodyView;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Support\Collection;
use Livewire\Component;
use Modules\Xot\Contracts\PanelContract;
use Modules\Xot\Services\PanelService;

use Modules\Theme\Http\Livewire\Modal\BodyView as BaseComponent;

/**
 * Class Sort/Collection.
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