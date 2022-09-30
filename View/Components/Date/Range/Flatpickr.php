<?php

declare(strict_types=1);

namespace Modules\Theme\View\Components\Date\Range;

use Closure;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\View\Component;

class Flatpickr extends Component {
    public string $type;

    public function __construct(?string $type = 'flatpickr'){
        $this->type = $type;
    }


    public function render() : \Illuminate\Contracts\Support\Renderable {
        
        $view = 'theme::components.date.range.'.$this->type;

        $view_params = [
            'view' => $view,
        ];

        return view()->make($view, $view_params);
    }
}