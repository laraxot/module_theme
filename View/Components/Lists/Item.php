<?php

declare(strict_types=1);

namespace Modules\Theme\View\Components\Lists;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\View\Component;

/**
 * Class Item.
 */
class Item extends Component {
    // public array $attrs = [];
    public ?string $li_class;
    public ?string $li_attribute;
    public Model $row;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(Model $row, ?string $li_class = '', ?string $li_attribute = '') {
        $this->li_class = $li_class;
        $this->li_attribute = $li_attribute;
        $this->row = $row;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): Renderable {
        $view = 'theme::components.lists.item';

        $view_params = [
            'view' => $view,
        ];

        return view()->make($view, $view_params);
    }
}
