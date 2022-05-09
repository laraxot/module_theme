<?php

declare(strict_types=1);

namespace Modules\Theme\Menu;

use Illuminate\Contracts\Routing\UrlGenerator;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

/**
 * Class ActiveChecker.
 */
class ActiveChecker
{
    private Request $request;

    private UrlGenerator $url;

    public function __construct(Request $request, UrlGenerator $url)
    {
        $this->request = $request;
        $this->url = $url;
    }

    /**
     * @param array $item
     *
     * @return bool
     */
    public function isActive($item)
    {
        if (isset($item['active'])) {
            return $this->isExplicitActive($item['active']);
        }

        if (isset($item['submenu'])) {
            return $this->containsActive($item['submenu']);
        }

        if (isset($item['href'])) {
            return $this->checkExactOrSub($item['href']);
        }

        // Support URL for backwards compatibility
        if (isset($item['url'])) {
            return $this->checkExactOrSub($item['url']);
        }

        return false;
    }

    /**
     * @param string $url
     *
     * @return bool
     */
    protected function checkExactOrSub($url)
    {
        return $this->checkExact($url) || $this->checkSub($url);
    }

    /**
     * @param string $url
     *
     * @return bool
     */
    protected function checkExact($url)
    {
        return $this->checkPattern($url);
    }

    /**
     * @param string $url
     *
     * @return bool
     */
    protected function checkSub($url)
    {
        return $this->checkPattern($url.'/*') || $this->checkPattern($url.'?*');
    }

    /**
     * @param string $pattern
     *
     * @return bool
     */
    protected function checkPattern($pattern)
    {
        $fullUrlPattern = $this->url->to($pattern);

        $fullUrl = $this->request->fullUrl();

        return Str::is($fullUrlPattern, $fullUrl);
    }

    /**
     * @param array $items
     *
     * @return bool
     */
    protected function containsActive($items)
    {
        foreach ($items as $item) {
            if ($this->isActive($item)) {
                return true;
            }
        }

        return false;
    }

    /**
     * @param array $active
     *
     * @return bool
     */
    private function isExplicitActive($active)
    {
        foreach ($active as $url) {
            if ($this->checkExact($url)) {
                return true;
            }
        }

        return false;
    }
}
