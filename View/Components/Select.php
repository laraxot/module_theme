<?php

declare(strict_types=1);

namespace Modules\Theme\View\Components;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\View\Component;

/**
 * Class Select.
 */
class Select extends Component {
    public string $type = 'select';
    public bool $no_bg;
    public array $select_option_list;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(?bool $no_bg = false, array $select_option_list) {
        $this->no_bg = $no_bg;
        $this->select_option_list = $select_option_list;
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
