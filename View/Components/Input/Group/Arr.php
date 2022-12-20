<?php

declare(strict_types=1);

namespace Modules\Theme\View\Components\Input\Group;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\View\Component;

// Arr because Array is reserved

class Arr extends Component {
    public array $arr = [];

    /**
     * Undocumented function.
     *
     * @param array $arr
     */
    public function __construct($arr) {
        if (! \is_array($arr)) {
            dddx($arr);
        }
        $this->arr = $arr;
    }

    /**
     * Get the view / contents that represents the component.
     */
    public function render(): Renderable {
        $view = 'theme::components.input.group.arr';
        $view_params = [
            'view' => $view,
        ];

        return view($view, $view_params);
    }
}
