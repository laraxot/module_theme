<?php

declare(strict_types=1);

namespace Modules\Theme\View\Components;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\View\Component;

/**
 * Class Nav.
 */
class Nav extends Component {
<<<<<<< HEAD
    public string $type;
=======
    public ?string $type = 'nav';
>>>>>>> 6d7fdd4 (up)

    /**
     * Create a new component instance.
     *
     * @return void
     */
<<<<<<< HEAD
    public function __construct(?string $type = 'nav') {
=======
    public function __construct(?string $type) {
>>>>>>> 6d7fdd4 (up)
        $this->type = $type;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): Renderable {
        $view = 'theme::components.nav.'.$this->type;
        $view_params = [
            'view' => $view,
        ];

        return view()->make($view, $view_params);
    }
}
