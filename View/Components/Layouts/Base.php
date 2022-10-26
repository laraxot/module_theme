<?php

declare(strict_types=1);

namespace Modules\Theme\View\Components\Layouts;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

/**
 * Class Html.
 */
class Base extends Component {
    protected string $type;
    protected string $title;

    public function __construct(?string $title = null, ?string $type = null) {
        $this->title = $title ?? '';
        $this->type = $type ?? 'base';
    }

    public function render(): Renderable {
        /**
         * @phan-var view-string
         */
        $view = 'theme::components.layouts.base.'.$this->type;

        $view_params = [
        ];

        return view($view, $view_params);
    }

    /*
    public function title(): string {
        if (\is_string(config('app.name', 'Laravel'))) {
            return $this->title ?: config('app.name', 'Laravel');
        } else {
            return 'NO TITLE';
        }
    }
    */
}
