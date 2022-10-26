<?php

declare(strict_types=1);

namespace Modules\Theme\View\Components\List;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\View\Component;

/**
 * Class Item2.
 */
class Item2 extends Component
{
    public ?string $li_class;
    public ?string $li_attribute;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(?string $li_class = '', ?string $li_attribute = '')
    {
        $this->li_class = $li_class;
        $this->li_attribute = $li_attribute;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): Renderable
    {
        /**
         * @phpstan-var view-string
         */
        $view = 'theme::components.lists.item';

        $view_params = [
            'view' => $view,
        ];

        return view()->make($view, $view_params);
    }
}
