<?php

declare(strict_types=1);

namespace Modules\Theme\View\Components\Input;

use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;
use Illuminate\View\Component;

class Submit extends Component {
    /**
     * Attribute specifies where to send
     * the form-data when a form is submitted.
     */
    public string $action;

    /**
     * The id attribute specifies the form and button.
     */
    public string $formId;

    public function __construct(string $action, string $formId = null) {
        $this->action = Route::has($action) ? route($action) : $action;
        $this->formId = $formId ?? (string) Str::uuid();
    }

    public function render(): View {
        /**
         * @phpstan-var view-string
         */
        $view = 'theme::components.input.submit';
        $view_params = [
            'view' => $view,
        ];

        return view()->make($view, $view_params);
    }
}
