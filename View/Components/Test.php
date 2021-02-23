<<<<<<< HEAD
<?php

namespace Modules\Theme\View\Components;

use Illuminate\View\Component;

/**
 * Class Test.
 */
class Test extends Component {
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct() {
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render() {
        return view()->make('components.forms.input');
    }
=======
<?php

declare(strict_types=1);

namespace Modules\Theme\View\Components;

use Illuminate\View\Component;

/**
 * Class Test.
 */
class Test extends Component {
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct() {
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render() {
        return view()->make('components.forms.input');
    }
>>>>>>> 9f0111a33322bf5ce36bbb7187f5866a7193d90f
}