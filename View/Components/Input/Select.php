<?php

declare(strict_types=1);

namespace Modules\Theme\View\Components\Input;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\View\Component;

/**
 * Class Select.
 */
class Select extends Component {
    public array $attrs = [];
    public array $options = [];

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct() {
        //$this->options = $options;
        //$this->attrs['name'] = $name;
        //$this->attrs['id'] = 'form_'.$name;
        //$this->attrs['class'] = $class;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): Renderable {
        $view = 'theme::components.input.select';
        $view_params = [
            'view' => $view,
        ];
        return view()->make($view, $view_params);
    }
}
