<?php

declare(strict_types=1);

namespace Modules\Theme\Http\Livewire\Modal\BodyView;

use Illuminate\Support\Collection;
use Modules\Theme\Http\Livewire\Modal\BodyView as BaseComponent;

/**
 * Class Sort/Collection.
 */
class Sort extends BaseComponent
{
    public function updateTaskOrder(array $list): void
    {
        dddx($list);
    }
}
