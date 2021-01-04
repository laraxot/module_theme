<?php

namespace Modules\Theme\Menu\Filters;

use Modules\Theme\Menu\Builder;

interface FilterInterface {
    public function transform($item, Builder $builder);
}
