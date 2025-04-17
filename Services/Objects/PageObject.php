<?php

declare(strict_types=1);

namespace Modules\Theme\Services\Objects;

/**
 * Class PageObject.
 */
class PageObject
{
    /**
     * @param string $field
     *
     * @return array|string
     */
    public function __get($field)
    {
        switch ($field) {
            case 'navigation':
                return $this->getNavigationAttribute();
        }

        return $field;
    }

    /**
     * @return string
     */
    public function getUrl()
    {
        return 'url';
    }

    /**
     * @param string $str
     */
    public function url($str)
    {
        return $str;
    }

    /**
     * @return array
     */
    public function getNavigationAttribute()
    {
        return [
            'Getting Started' => (object) [
                'url' => 'docs/getting-started',
                'children' => [
                    'Customizing Your Site' => 'docs/customizing-your-site',
                    'Navigation' => 'docs/navigation',
                    'Algolia DocSearch' => 'docs/algolia-docsearch',
                    'Custom 404 Page' => 'docs/custom-404-page',
                ],
            ],
            'Jigsaw Docs' => 'https://jigsaw.tighten.co/docs/installation',
        ];
    }

    /**
     * @return bool
     */
    public function isActiveParent()
    {
        return false;
    }

    /**
     * @return bool
     */
    public function isActive()
    {
        return false;
    }
}
