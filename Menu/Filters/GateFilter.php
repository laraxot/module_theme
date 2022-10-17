<?php

declare(strict_types=1);

namespace Modules\Theme\Menu\Filters;

use Illuminate\Contracts\Auth\Access\Gate;
use Modules\Theme\Menu\Builder;

/**
 * Class GateFilter.
 */
<<<<<<< HEAD
class GateFilter implements FilterInterface {
    protected Gate $gate;

    public function __construct(Gate $gate) {
=======
class GateFilter implements FilterInterface
{
    protected Gate $gate;

    public function __construct(Gate $gate)
    {
>>>>>>> ede0df7 (first)
        $this->gate = $gate;
    }

    /**
     * @param array $item
     *
     * @return array|bool
     */
<<<<<<< HEAD
    public function transform($item, Builder $builder) {
=======
    public function transform($item, Builder $builder)
    {
>>>>>>> ede0df7 (first)
        if (! $this->isVisible($item)) {
            return false;
        }

        if (isset($item['dropdown'])) {
            $filtered = [];
            foreach ($item['dropdown'] as &$subitem) {
                if ($this->isVisible($subitem)) {
                    $filtered[] = $subitem;
                }
            }
            $item['dropdown'] = $filtered;

            return $item;
        }

        if (isset($item['megamenu'])) {
            $filtered = [];
            foreach ($item['megamenu'] as &$submenu) {
                $filtered2 = [];
                foreach ($submenu as $i => &$subitem) {
                    if ($this->isVisible($subitem)) {
                        $filtered2[] = $subitem;
                    }
                }
                $filtered[] = $filtered2;
            }
            $item['megamenu'] = $filtered;
        }

        return $item;
    }

    /**
     * @param array $item
     *
     * @return bool
     */
<<<<<<< HEAD
    protected function isVisible($item) {
=======
    protected function isVisible($item)
    {
>>>>>>> ede0df7 (first)
        if (! isset($item['can'])) {
            return true;
        }

        if (isset($item['model'])) {
            return $this->gate->allows($item['can'], $item['model']);
        }

        return $this->gate->allows($item['can']);
    }
}
