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

<<<<<<< HEAD
    public ?string $type; // v1,v2,v3
=======
    public ?string $type; //v1,v2,v3
>>>>>>> ede0df7 (first)

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
>>>>>>> ede0df7 (first)
=======
    public function __construct(?string $type = null, ?string $action = '#', ?string $icon = 'fa fa-search') {
        $this->type = $type;
        $this->attrs['action'] = $action;
        $this->attrs['icon'] = $icon;
>>>>>>> 3471883 (.)
    }

    /**
     * Get the view / contents that represents the component.
     */
    public function render(): Renderable {
<<<<<<< HEAD
        /**
         * @phpstan-var view-string
         */
        $view = 'theme::components.form.search';
        if (null !== $this->type) {
=======
        $view = 'theme::components.form.search';
        if (null != $this->type) {
>>>>>>> ede0df7 (first)
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
>>>>>>> ede0df7 (first)
=======
}
>>>>>>> 3471883 (.)
