<?php

declare(strict_types=1);

namespace Modules\Theme\View\Components;

<<<<<<< HEAD
use Illuminate\Contracts\Support\Renderable;
use Illuminate\View\Component;
=======
use Illuminate\View\Component;
use Illuminate\Contracts\Support\Renderable;
>>>>>>> ede0df7 (first)

/**
 * Class Spinner.
 */
class Spinner extends Component {
    public string $type;
<<<<<<< HEAD

=======
    
>>>>>>> ede0df7 (first)
    /**
     * Create a new component instance.
     *
     * @return void
     */
<<<<<<< HEAD
    public function __construct(?string $type = null) {
        if (null === $type) {
            $type = 'default';
        }
        $this->type = $type;
=======
    public function __construct(?string $type=null) {
        if($type===null){
            $type='default';
        }
        $this->type = $type;
        
>>>>>>> ede0df7 (first)
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): Renderable {
<<<<<<< HEAD
        /**
         * @phpstan-var view-string
         */
=======
>>>>>>> ede0df7 (first)
        $view = 'theme::components.spinner.'.$this->type;
        $view_params = [
            'view' => $view,
        ];

        return view()->make($view, $view_params);
    }
<<<<<<< HEAD
}
=======

   
}
>>>>>>> ede0df7 (first)
