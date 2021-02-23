<<<<<<< HEAD
<?php

namespace Modules\Theme\View\Components\Test;

use Illuminate\Contracts\View\View as ViewContract;
use Illuminate\View\Component;
use Illuminate\View\View;

/**
 * Class Sub
 * @package Modules\Theme\View\Components\Test
 */
class Sub extends Component {
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct() {
    }

    /**
     * Get the view / contents that represent the component.
     * @return ViewContract
     * @return ViewContract
     */
    public function render(): ViewContract {
        return view()->make('components.forms.input');
    }
}
=======
<?php

namespace Modules\Theme\View\Components\Test;

use Illuminate\Contracts\View\View as ViewContract;
use Illuminate\View\Component;
use Illuminate\View\View;

/**
 * Class Sub.
 */
class Sub extends Component {
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct() {
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): ViewContract {
        return view()->make('components.forms.input');
    }
}
>>>>>>> 9f0111a33322bf5ce36bbb7187f5866a7193d90f
