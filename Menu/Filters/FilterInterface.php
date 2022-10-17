<?php

declare(strict_types=1);

namespace Modules\Theme\Menu\Filters;

use Modules\Theme\Menu\Builder;

/**
 * Interface FilterInterface.
 */
<<<<<<< HEAD
interface FilterInterface {
=======
interface FilterInterface
{
>>>>>>> ede0df7 (first)
    /**
     * @return mixed
     */
    public function transform(array $item, Builder $builder);
}
