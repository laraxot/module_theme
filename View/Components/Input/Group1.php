<?php

declare(strict_types=1);

namespace Modules\Theme\View\Components\Input;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Support\Facades\View;
use Illuminate\View\Component;

/**
 * Undocumented class.
 */
class Group1 extends Component {
    public string $tpl = 'v1';

    public function __costruct(?string $tpl = 'v1'): void {
        $this->tpl = $tpl;
    }

    /**
     * Get the view / contents that represents the component.
     */
    public function render(): Renderable {
        /**
         * @phpstan-var view-string
         */
        $view = 'theme::components.input.group.'.$this->tpl;

        $view_params = [
            'view' => $view,
            // 'field' => (object) $this->field,
        ];

        return View::make($view, $view_params);
    }

    public function shouldRender(): bool {
        return true;
    }
}
