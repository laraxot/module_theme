<?php

declare(strict_types=1);

namespace Modules\Theme\View\Components\IndexNav;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\View\Component;

/**
 * Class Search.
 * da cancellare, utilizzare
 * <x-input.group type="text" name="q" />.
 */
class Search extends Component {
    public array $attrs = [];
<<<<<<< HEAD
    // public ?string $type = null;
=======
    //public ?string $type = null;
>>>>>>> ede0df7 (first)
    public ?string $action = null;

    /**
     * Create a new component instance.
     *
     * @return void
     */
<<<<<<< HEAD
    public function __construct(/* ?string $type = null, */ ?string $action = null) {
        // $this->type = isset($type) ? $type : 'default';
=======
    public function __construct(/*?string $type = null,*/ ?string $action = null) {
        //$this->type = isset($type) ? $type : 'default';
>>>>>>> ede0df7 (first)
        $this->action = $action;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): Renderable {
<<<<<<< HEAD
        /**
         * @phpstan-var view-string
         */
        $view = 'theme::components.index_nav.search'; // .'.$this->type;
=======
        $view = 'theme::components.index_nav.search'; //.'.$this->type;
>>>>>>> ede0df7 (first)

        $view_params = [
            'view' => $view,
        ];

        return view()->make($view, $view_params);
    }
}
