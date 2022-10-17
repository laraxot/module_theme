<?php

declare(strict_types=1);

namespace Modules\Theme\View\Components\Dashboard;

<<<<<<< HEAD
use Illuminate\Contracts\Support\Renderable;
use Illuminate\View\Component;

// use Modules\Xot\View\Components\XotBaseComponent;
=======
use Illuminate\View\Component;

//use Modules\Xot\View\Components\XotBaseComponent;
>>>>>>> ede0df7 (first)

/**
 * Class Field.
 */
<<<<<<< HEAD
class Item extends Component {
    /**
     * Undocumented function.
     */
    public function render(): Renderable {
        /**
         * @phpstan-var view-string
         */
=======
class Item extends Component
{
    public function render(): \Illuminate\Contracts\Support\Renderable
    {
>>>>>>> ede0df7 (first)
        $view = 'theme::empty';
        $view_params = [
            'view' => $view,
        ];

        return view()->make($view, $view_params);
    }

<<<<<<< HEAD
    public function shouldRender(): bool {
=======
    public function shouldRender(): bool
    {
>>>>>>> ede0df7 (first)
        return false;
    }
}
