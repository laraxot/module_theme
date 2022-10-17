<?php

declare(strict_types=1);

namespace Modules\Theme\View\Components\Input;

use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;
use Illuminate\View\Component;

<<<<<<< HEAD
class Submit extends Component {
=======
class Submit extends Component
{
>>>>>>> ede0df7 (first)
    /**
     * Attribute specifies where to send
     * the form-data when a form is submitted.
     */
    public string $action;

    /**
     * The id attribute specifies the form and button.
     */
    public string $formId;

<<<<<<< HEAD
    public function __construct(string $action, string $formId = null) {
=======
    public function __construct(string $action, string $formId = null)
    {
>>>>>>> ede0df7 (first)
        $this->action = Route::has($action) ? route($action) : $action;
        $this->formId = $formId ?? (string) Str::uuid();
    }

<<<<<<< HEAD
    public function render(): View {
        /**
         * @phpstan-var view-string
         */
=======
    public function render(): View
    {
>>>>>>> ede0df7 (first)
        $view = 'theme::components.input.submit';
        $view_params = [
            'view' => $view,
        ];

        return view()->make($view, $view_params);
    }
}
