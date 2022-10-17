<?php

declare(strict_types=1);

namespace Modules\Theme\View\Components;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\View\Component;

/**
 * Undocumented class.
 */
class Callout extends Component {
    public string $type;
    public string $title;

    public function __construct(string $type = 'info', string $title = '') {
        $this->type = $type;
        $this->title = $title;
    }

    public function render(): Renderable {
<<<<<<< HEAD
        /**
         * @phpstan-var view-string
         */
        $view = 'theme::components.callout';

        if($this->type != 'info'){
            $view = 'theme::components.callout.'.$this->type;
        }

=======
        $view = 'theme::components.callout';
>>>>>>> ede0df7 (first)
        $view_params = ['view' => $view];

        return view()->make($view, $view_params);
    }
}
