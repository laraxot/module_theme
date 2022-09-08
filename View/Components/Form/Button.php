<?php

declare(strict_types=1);

namespace Modules\Theme\View\Components\Form;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\View\Component;

/**
 * Class Button.
 */
class Button extends Component {
    public array $attrs = [];

    public function __construct(?string $class = 'btn btn-primary', ?string $type = 'submit') {
        $this->attrs['class'] = $class;
        $this->attrs['type'] = $type;
    }

    public function render(): Renderable {
        /**
         * @phpstan-var view-string
         */
        $view = 'theme::components.form.button';
        $view_params = [
            'view' => $view,
        ];

        return view()->make($view, $view_params);
    }
}
