<?php
namespace Modules\Theme\Services\Objects;


class PageObject{
    public function __get($field) {
        switch($field){
            case 'navigation': return $this->getNavigationAttribute();
        }
        return $field;
    }

    public function getUrl(){
        return 'url';
    }

    public function url($str){
        return $str;
    }

    public function getNavigationAttribute(){
        return [
            'Getting Started' => (object)[
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


    public function isActiveParent(){
        return false;
    }

    public function isActive(){
        return false;
    }
}
