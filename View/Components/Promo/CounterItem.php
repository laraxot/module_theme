<?php

declare(strict_types=1);
<<<<<<< HEAD
// -- in module/theme

namespace Modules\Theme\View\Components\Promo;

=======
//-- in module/theme
namespace Modules\Theme\View\Components\Promo;


>>>>>>> ede0df7 (first)
use Illuminate\View\Component;

/**
 * Undocumented class.
 */
class CounterItem extends Component {
<<<<<<< HEAD
    public int $counter;

=======
    public $counter;
>>>>>>> ede0df7 (first)
    /**
     * Create a new component instance.
     *
     * @return void
     */
<<<<<<< HEAD
    public function __construct(int $counter) {
=======
 
    public function __construct($counter) {
>>>>>>> ede0df7 (first)
        $this->counter = $counter;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render() {
        return view()->make('theme::components.promo.counter-item');
    }
<<<<<<< HEAD
=======
    
>>>>>>> ede0df7 (first)
}
