<?php

declare(strict_types=1);

namespace Modules\Theme\View\Components\Carousel;

use Illuminate\View\View;
use Illuminate\View\Component;
use Illuminate\Contracts\Support\Renderable;

/**
 * Class Item.
 */
class Item extends Component {
    public array $attrs;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(?string $class = '', ?string $style = '', ?string $id = '') {
        $this->attrs['class'] = $class;
        $this->attrs['style'] = $style;
        $this->attrs['id'] = $id;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): Renderable {
        /** 
        * @phpstan-var view-string
        */        
        $view = 'theme::components.carousel.Item';

        $view_params = [];
        //*
        //view()->exists($view);
        return view($view, $view_params);
        //*/
        //return $this->renderView($view,$view_params);
        
    }

    /*
    * @phpstan-param view-string $view
    * @param string $view
    * @return \Illuminate\View\View
    
    public function renderView(string $view,array $view_params): View {
        return view($view,$view_params);
    }
    */
}