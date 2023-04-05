<?php

declare(strict_types=1);

namespace Modules\Theme\View\Components\Alerts;

use Illuminate\Contracts\View\View;
use Modules\Xot\View\Components\XotBaseComponent;

/**
 * Class Error.
 */
class Error extends XotBaseComponent
{
    public array $attrs = [];
    public string $errors; // spero sia string

    public function __construct(string $errors)
    {
        $this->errors = $errors;
    }

    public function render(): View
    {
        return view()->make('theme::components.alerts.error');
    }
}
