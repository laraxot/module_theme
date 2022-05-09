<?php

declare(strict_types=1);

namespace Modules\Theme\Menu\Filters;

use Illuminate\Contracts\Routing\UrlGenerator;
use Modules\Theme\Menu\Builder;

/**
 * Class HrefFilter.
 */
class HrefFilter implements FilterInterface
{
    protected UrlGenerator $urlGenerator;

    public function __construct(UrlGenerator $urlGenerator)
    {
        $this->urlGenerator = $urlGenerator;
    }

    /**
     * @param array $item
     *
     * @return mixed
     */
    public function transform($item, Builder $builder)
    {
        if (! isset($item['header'])) {
            $item['href'] = $this->makeHref($item);
            if (isset($item['dropdown'])) {
                foreach ($item['dropdown'] as &$subitem) {
                    if (! (is_string($subitem))) {
                        $subitem['href'] = $this->makeHref($subitem);
                    }
                }
            }

            if (isset($item['megamenu'])) {
                foreach ($item['megamenu'] as &$submenu) {
                    foreach ($submenu as $i => &$subitem) {
                        if (! (is_string($subitem))) {
                            $subitem['href'] = $this->makeHref($subitem);
                        }
                        $submenu[$i] = $subitem;
                    }
                }
            }
        }

        return $item;
    }

    /**
     * @param array $item
     *
     * @return string
     */
    protected function makeHref($item)
    {
        if (isset($item['url'])) {
            return $this->urlGenerator->to($item['url']);
        }

        if (isset($item['route'])) {
            return $this->urlGenerator->route($item['route']);
        }

        return '#';
    }
}
