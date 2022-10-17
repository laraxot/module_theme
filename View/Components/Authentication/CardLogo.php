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
class CardLogo extends Component {
    public function render() {
        /**
         * @phpstan-var view-string
         */
=======
class CardLogo extends Component
{
    public function render()
    {
>>>>>>> ede0df7 (first)
        $view = 'theme::components.authentication.card-logo';
        $view_params = [
            'view' => $view,
        ];

        return view()->make($view, $view_params);
    }
}
