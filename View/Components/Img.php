<?php

declare(strict_types=1);

namespace Modules\Theme\View\Components;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\View\Component;
use Modules\Theme\Services\ThemeService;

/**
 * Undocumented class.
 */
class Img extends Component
{
    public array $attrs = [];

    /**
     * Undocumented function.
     */
    public function __construct(string $src = null)
    {
        $this->attrs['src'] = ThemeService::asset($src);
    }

    /**
     * Get the view / contents that represents the component.
     */
    public function render(): Renderable
    {
        $view = 'theme::components.img';
        $view_params = [
            'view' => $view,
        ];

        return view()->make($view, $view_params);
    }
}
