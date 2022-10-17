<?php

declare(strict_types=1);

namespace Modules\Theme\View\Components\Authentication;

use Illuminate\View\Component;

<<<<<<< HEAD
// use Modules\Xot\View\Components\XotBaseComponent;
=======
//use Modules\Xot\View\Components\XotBaseComponent;
>>>>>>> ede0df7 (first)

/**
 * Class Field.
 */
<<<<<<< HEAD
class Card extends Component {
    public function render(): \Illuminate\Contracts\Support\Renderable {
        /**
         * @phpstan-var view-string
         */
=======
class Card extends Component
{
    public function render():\Illuminate\Contracts\Support\Renderable
    {
>>>>>>> ede0df7 (first)
        $view = 'theme::components.authentication.card';
        $view_params = [
            'view' => $view,
        ];

        return view()->make($view, $view_params);
    }
}
