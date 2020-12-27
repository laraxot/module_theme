<?php

namespace Modules\Theme\Menu\Filters;

use Modules\Theme\Menu\ActiveChecker;
use Modules\Theme\Menu\Builder;

class ActiveFilter implements FilterInterface {
    private $activeChecker;

    public function __construct(ActiveChecker $activeChecker) {
        $this->activeChecker = $activeChecker;
    }

    public function transform($item, Builder $builder) {
        if (! isset($item['header'])) {
            $item['active'] = $this->activeChecker->isActive($item);
        }

        return $item;
    }
}
