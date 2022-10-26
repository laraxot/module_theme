<?php

declare(strict_types=1);

namespace Modules\Theme\View\Components\Input;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\View\Component;
use Modules\Xot\Services\FileService;

/**
 * Undocumented class.
 */
class Date extends Component
{
    public array $attrs = [];

    /**
     * Undocumented function.
     */
    public function __construct(?string $class, string $placeholder, string $name, ?string $style = '', string $value = '')
    {
        $this->attrs['class'] = $class;
        $this->attrs['style'] = $style;
        $this->attrs['placeholder'] = $placeholder;
        $this->attrs['name'] = $name;
        $this->attrs['value'] = $value;
    }

    /**
     * Get the view / contents that represents the component.
     */
    public function render(): Renderable
    {
        $theme = inAdmin() ? 'adm_theme' : 'pub_theme';
        FileService::viewCopy('theme::components.input.date', $theme.'::components.input.date');

        $view = $theme.'::components.input.date';

        $view_params = [
            'view' => $view,
        ];

        return view()->make($view, $view_params);
    }
}
