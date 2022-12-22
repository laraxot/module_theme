<?php

declare(strict_types=1);

namespace Modules\Theme\View\Components\Category;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Support\Collection;
use Illuminate\View\Component;

/**
 * Class Lists.
 */
class Lists extends Component {
    public string $type;
    public Collection $icon_lists;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(Collection $icon_lists, ?string $type = 'category.categories') {
        $this->icon_lists = $icon_lists;
        $this->type = $type;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): Renderable {
        $view = 'theme::components.'.$this->type;
        $view_params = [
            'view' => $view,
        ];

        return view()->make($view, $view_params);
    }
}
