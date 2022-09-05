<?php

declare(strict_types=1);

namespace Modules\Theme\View\Components\Progress\Tot;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\View\Component;

/**
 * Class Bar.
 */
class Bar extends Component {
    public float $value;
    public float $tot;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(float $value, float $tot) {
        $this->value = $value;
        $this->tot = $tot;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): Renderable {
        /** 
        * @phpstan-var view-string
        */

        if($this->tot > 0){
            $width = $this->value/$this->tot;
        }else{
            $width = 0;
        }

        $view = 'theme::components.progress.bar_tot';
        $view_params = [
            'view' => $view,
            'width' => $width,
        ];

        return view()->make($view, $view_params);
    }
}
