<?php

declare(strict_types=1);

namespace Modules\Theme\Services\Objects;

/**
 * Class PageObject.
 */
<<<<<<< HEAD
class PageObject {
=======
class PageObject
{
>>>>>>> ede0df7 (first)
    /**
     * @param string $field
     *
     * @return array|string
     */
<<<<<<< HEAD
    public function __get($field) {
        switch ($field) {
            case 'navigation':
                return $this->getNavigationAttribute();
=======
    public function __get($field)
    {
        switch ($field) {
        case 'navigation': 
            return $this->getNavigationAttribute();
>>>>>>> ede0df7 (first)
        }

        return $field;
    }

    /**
     * @return string
     */
<<<<<<< HEAD
    public function getUrl() {
=======
    public function getUrl()
    {
>>>>>>> ede0df7 (first)
        return 'url';
    }

    /**
     * @param string $str
     *
     * @return mixed
     */
<<<<<<< HEAD
    public function url($str) {
=======
    public function url($str)
    {
>>>>>>> ede0df7 (first)
        return $str;
    }

    /**
     * @return array
     */
<<<<<<< HEAD
    public function getNavigationAttribute() {
=======
    public function getNavigationAttribute()
    {
>>>>>>> ede0df7 (first)
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
<<<<<<< HEAD
    public function isActiveParent() {
=======
    public function isActiveParent()
    {
>>>>>>> ede0df7 (first)
        return false;
    }

    /**
     * @return bool
     */
<<<<<<< HEAD
    public function isActive() {
=======
    public function isActive()
    {
>>>>>>> ede0df7 (first)
        return false;
    }
}
