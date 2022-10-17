<?php

declare(strict_types=1);

namespace Modules\Theme\Menu;

use Illuminate\Contracts\Routing\UrlGenerator;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

/**
 * Class ActiveChecker.
 */
<<<<<<< HEAD
class ActiveChecker {
=======
class ActiveChecker
{
>>>>>>> ede0df7 (first)
    private Request $request;

    private UrlGenerator $url;

<<<<<<< HEAD
    public function __construct(Request $request, UrlGenerator $url) {
=======
    public function __construct(Request $request, UrlGenerator $url)
    {
>>>>>>> ede0df7 (first)
        $this->request = $request;
        $this->url = $url;
    }

    /**
     * @param array $item
     *
     * @return bool
     */
<<<<<<< HEAD
    public function isActive($item) {
=======
    public function isActive($item)
    {
>>>>>>> ede0df7 (first)
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
<<<<<<< HEAD
    protected function checkExactOrSub($url) {
=======
    protected function checkExactOrSub($url)
    {
>>>>>>> ede0df7 (first)
        return $this->checkExact($url) || $this->checkSub($url);
    }

    /**
     * @param string $url
     *
     * @return bool
     */
<<<<<<< HEAD
    protected function checkExact($url) {
=======
    protected function checkExact($url)
    {
>>>>>>> ede0df7 (first)
        return $this->checkPattern($url);
    }

    /**
     * @param string $url
     *
     * @return bool
     */
<<<<<<< HEAD
    protected function checkSub($url) {
=======
    protected function checkSub($url)
    {
>>>>>>> ede0df7 (first)
        return $this->checkPattern($url.'/*') || $this->checkPattern($url.'?*');
    }

    /**
     * @param string $pattern
     *
     * @return bool
     */
<<<<<<< HEAD
    protected function checkPattern($pattern) {
=======
    protected function checkPattern($pattern)
    {
>>>>>>> ede0df7 (first)
        $fullUrlPattern = $this->url->to($pattern);

        $fullUrl = $this->request->fullUrl();

        return Str::is($fullUrlPattern, $fullUrl);
    }

    /**
     * @param array $items
     *
     * @return bool
     */
<<<<<<< HEAD
    protected function containsActive($items) {
=======
    protected function containsActive($items)
    {
>>>>>>> ede0df7 (first)
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
<<<<<<< HEAD
    private function isExplicitActive($active) {
=======
    private function isExplicitActive($active)
    {
>>>>>>> ede0df7 (first)
        foreach ($active as $url) {
            if ($this->checkExact($url)) {
                return true;
            }
        }

        return false;
    }
}
