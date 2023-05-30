<?php

declare(strict_types=1);

namespace Modules\Theme\View\Components;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Support\Facades\View;
use Illuminate\View\Component;

class Card extends Component
{
    public ?string $type = 'card';

    public array $attrs = [];

    public function __construct(string $type = null)
    {
        $this->type = $type ?? 'card';
    }

    public function render(): Renderable
    {
        /**
         * @phpstan-var view-string
         */
        $view = 'theme::components.card.'.$this->type;

        $view_params = [];

        return View::make($view, $view_params);
    }
}
