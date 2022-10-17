<?php

declare(strict_types=1);

namespace Modules\Theme\View\Components\Forms;

use Illuminate\Contracts\View\View;
use Modules\Xot\Contracts\PanelContract;
use Modules\Xot\View\Components\XotBaseComponent;

/**
 * Class Panel.
 */
class Panel extends XotBaseComponent {
    public string $action;

    public PanelContract $panel;

    public function __construct(string $action, PanelContract $panel) {
        $this->action = $action;
        $this->panel = $panel;
    }

    public function render(): View {
        return view()->make('theme::components.form.panel');
    }
}
