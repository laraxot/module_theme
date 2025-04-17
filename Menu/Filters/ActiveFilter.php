<?php

declare(strict_types=1);

namespace Modules\Theme\Menu\Filters;

use Modules\Theme\Menu\ActiveChecker;
use Modules\Theme\Menu\Builder;

/**
 * Class ActiveFilter.
 */
class ActiveFilter implements FilterInterface
{
    private ActiveChecker $activeChecker;

    public function __construct(ActiveChecker $activeChecker)
    {
        $this->activeChecker = $activeChecker;
    }

    /**
     * @param array $item
     */
    public function transform($item, Builder $builder)
    {
        if (! isset($item['header'])) {
            $item['active'] = $this->activeChecker->isActive($item);
        }

        return $item;
    }
}
