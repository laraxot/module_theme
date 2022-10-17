<?php

declare(strict_types=1);

namespace Modules\Theme\Menu\Filters;

use Modules\Theme\Menu\ActiveChecker;
use Modules\Theme\Menu\Builder;

/**
 * Class ActiveFilter.
 */
<<<<<<< HEAD
class ActiveFilter implements FilterInterface {
    private ActiveChecker $activeChecker;

    public function __construct(ActiveChecker $activeChecker) {
=======
class ActiveFilter implements FilterInterface
{
    private ActiveChecker $activeChecker;

    public function __construct(ActiveChecker $activeChecker)
    {
>>>>>>> ede0df7 (first)
        $this->activeChecker = $activeChecker;
    }

    /**
     * @param array $item
     *
     * @return mixed
     */
<<<<<<< HEAD
    public function transform($item, Builder $builder) {
=======
    public function transform($item, Builder $builder)
    {
>>>>>>> ede0df7 (first)
        if (! isset($item['header'])) {
            $item['active'] = $this->activeChecker->isActive($item);
        }

        return $item;
    }
}
