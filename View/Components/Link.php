<?php

declare(strict_types=1);

namespace Modules\Theme\View\Components;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\View\Component;
use Modules\Theme\Services\ThemeService;

/**
 * Undocumented class.
 */
class Link extends Component {
    public array $attrs = [];
    public string $type = 'empty';

    /**
     * Undocumented function.
     */
    public function __construct(?string $rel = null, ?string $type = null, ?string $href = null) {
        $this->attrs['rel'] = $rel;
        $this->attrs['type'] = $type;
        $this->type = $type;
        $this->attrs['href'] = $href;
        if (null != $href) {
            ThemeService::add($href);
        }
    }

    /**
     * Get the view / contents that represents the component.
     */
    public function render(): Renderable {
        $view = 'theme::components.link.'.$this->type;
        $view_params = [
            'view' => $view,
        ];

        return view()->make($view, $view_params);
    }
}
