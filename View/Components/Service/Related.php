<?php
/**
 * @see https://github.com/italia/design-comuni-pagine-statiche/blob/main/src/components/related-services/related-services.hbs
 */

declare(strict_types=1);

namespace Modules\Theme\View\Components\Service;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

/**
 * Class Html.
 */
class Related extends Component {
    protected string $type;
    protected string $title;

    public function __construct() {
    }

    public function render(): Renderable {
        /**
         * @phan-var view-string
         */
        $view = 'theme::components.service.related.'.$this->type;
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
