<?php

declare(strict_types=1);

namespace Modules\Theme\View\Components;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\View\Component;

class GuestLayout extends Component {
    /**
     * Get the view / contents that represents the component.
     */
    public function render(): Renderable {
        /* 
        * @phpstan-var view-string
        
        $view = 'pub_theme::components.layouts.guest';
        */
        
        /** 
        * @phpstan-var view-string
        */
        $view = 'theme::components.layouts.guest';
        $view_params = [
            'view' => $view,
        ];

        return view()->make($view, $view_params);
    }
}