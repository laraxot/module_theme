<?php

declare(strict_types=1);

namespace Modules\Theme\Menu\Filters;

use Illuminate\Contracts\Routing\UrlGenerator;
use Modules\Theme\Menu\Builder;

/**
 * Class HrefFilter.
 */
<<<<<<< HEAD
class HrefFilter implements FilterInterface {
    protected UrlGenerator $urlGenerator;

    public function __construct(UrlGenerator $urlGenerator) {
=======
class HrefFilter implements FilterInterface
{
    protected UrlGenerator $urlGenerator;

    public function __construct(UrlGenerator $urlGenerator)
    {
>>>>>>> ede0df7 (first)
        $this->urlGenerator = $urlGenerator;
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
            $item['href'] = $this->makeHref($item);
            if (isset($item['dropdown'])) {
                foreach ($item['dropdown'] as &$subitem) {
<<<<<<< HEAD
                    if (! \is_string($subitem)) {
=======
                    if (! (is_string($subitem))) {
>>>>>>> ede0df7 (first)
                        $subitem['href'] = $this->makeHref($subitem);
                    }
                }
            }

            if (isset($item['megamenu'])) {
                foreach ($item['megamenu'] as &$submenu) {
                    foreach ($submenu as $i => &$subitem) {
<<<<<<< HEAD
                        if (! \is_string($subitem)) {
=======
                        if (! (is_string($subitem))) {
>>>>>>> ede0df7 (first)
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
<<<<<<< HEAD
    protected function makeHref($item) {
=======
    protected function makeHref($item)
    {
>>>>>>> ede0df7 (first)
        if (isset($item['url'])) {
            return $this->urlGenerator->to($item['url']);
        }

        if (isset($item['route'])) {
            return $this->urlGenerator->route($item['route']);
        }

        return '#';
    }
}
