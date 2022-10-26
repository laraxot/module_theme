<?php

declare(strict_types=1);

namespace Modules\Theme\View\Components;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

/**
 * Class Avatar.
 */
class Badge extends Component
{
    /**
     * Undocumented variable.
     */
    public string $type = 'default';

    /**
     * Undocumented function.
     */
    public function __construct()
    {
    }

    /**
     * Undocumented function.
     */
    public function render(): View
    {
        /**
         * @phpstan-var view-string
         */
        $view = 'theme::components.badge.'.$this->type;
        $view_params = [
            'view' => $view,
        ];

        return view()->make($view, $view_params);
    }
}
