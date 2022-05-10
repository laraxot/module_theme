<?php

declare(strict_types=1);

namespace Modules\Theme\View\Components\Form;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\View\Component;

/**
 * Undocumented class.
 */
class Search extends Component {
    public array $attrs = [];

    public ?string $type; //v1,v2,v3

    /**
     * Undocumented function.
     */
<<<<<<< HEAD
<<<<<<< HEAD
    public function __construct(?string $type = null, ?string $action = '#', ?string $icon = 'fa fa-search') {
        $this->type = $type;
        $this->attrs['action'] = $action;
        $this->attrs['icon'] = $icon;
=======
    public function __construct(?string $type = null, ?string $action = '#') {
        $this->type = $type;
        $this->attrs['action'] = $action;
>>>>>>> b6141c95 (first)
=======
    public function __construct(?string $type = null, ?string $action = '#') {
        $this->type = $type;
        $this->attrs['action'] = $action;
>>>>>>> 6aa89a58 (first)
    }

    /**
     * Get the view / contents that represents the component.
     */
    public function render(): Renderable {
        $view = 'theme::components.form.search';
        if (null != $this->type) {
            $view .= '.'.$this->type;
        }
        $view_params = [
            'view' => $view,
        ];

        return view()->make($view, $view_params);
    }
<<<<<<< HEAD
<<<<<<< HEAD
}
=======
}
>>>>>>> b6141c95 (first)
=======
}
>>>>>>> 6aa89a58 (first)
