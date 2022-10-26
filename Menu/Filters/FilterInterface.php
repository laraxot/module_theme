<?php

declare(strict_types=1);

namespace Modules\Theme\Menu\Filters;

use Modules\Theme\Menu\Builder;

/**
 * Interface FilterInterface.
 */
interface FilterInterface {
    /**
     * @return mixed
     */
    public function transform(array $item, Builder $builder);
}
