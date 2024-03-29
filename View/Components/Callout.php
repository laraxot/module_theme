<?php

declare(strict_types=1);

namespace Modules\Theme\View\Components;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\View\Component;

/**
 * Undocumented class.
 */
class Callout extends Component
{
    public string $type;
    public string $title;

    public function __construct(string $type = 'info', string $title = '')
    {
        $this->type = $type;
        $this->title = $title;
    }

    public function render(): Renderable
    {
        /**
         * @phpstan-var view-string
         */
        $view = 'theme::components.callout';

        if ('info' !== $this->type) {
            $view = 'theme::components.callout.'.$this->type;
        }

        $view_params = ['view' => $view];

        return view()->make($view, $view_params);
    }
}
