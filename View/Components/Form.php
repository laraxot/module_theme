<?php

declare(strict_types=1);

namespace Modules\Theme\View\Components;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\View\Component;

/**
 * Class Form.
 */
class Form extends Component {
    public string $action;

    public string $method;

    public bool $hasFiles;

<<<<<<< HEAD
    public function __construct(string $action = '', string $method = 'POST', bool $hasFiles = false) {
=======
    public function __construct(string $action, string $method = 'POST', bool $hasFiles = false) {
>>>>>>> ede0df7 (first)
        $this->action = $action;
        $this->method = strtoupper($method);
        $this->hasFiles = $hasFiles;
    }

    public function render(): Renderable {
<<<<<<< HEAD
        /**
         * @phpstan-var view-string
         */
=======
>>>>>>> ede0df7 (first)
        $view = 'theme::components.form';
        $view_params = [
            'view' => $view,
        ];

        return view()->make($view, $view_params);
    }
}
