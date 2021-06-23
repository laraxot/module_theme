<?php

declare(strict_types=1);

namespace Modules\Theme\View\Components\Alerts;

use Illuminate\Contracts\View\View;
use Modules\Xot\View\Components\XotBaseComponent;

/**
 * Class Error.
 */
class Error extends XotBaseComponent {
    public array $attrs = [];
    public $errors;

    public function __construct($errors) {
        $this->errors = $errors;
    }

    public function render(): View {
        return view('theme::components.alerts.error');
    }
}