<?php

declare(strict_types=1);

namespace Modules\Theme\View\Components\Form\Builder;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\View\Component;

class Arr extends Component {
    public array $arr;

    public function __construct(array $arr) {
        $this->arr = $arr;
    }

    public function render(): Renderable {
        $view = 'theme::components.form.builder.arr';
        $view_params = [];

        return view($view, $view_params);
    }
}
