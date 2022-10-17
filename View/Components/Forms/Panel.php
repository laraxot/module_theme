<?php

declare(strict_types=1);

namespace Modules\Theme\View\Components\Forms;

use Illuminate\Contracts\View\View;
use Modules\Xot\Contracts\PanelContract;
use Modules\Xot\View\Components\XotBaseComponent;

/**
 * Class Panel.
 */
<<<<<<< HEAD
class Panel extends XotBaseComponent {
=======
class Panel extends XotBaseComponent
{
>>>>>>> ede0df7 (first)
    public string $action;

    public PanelContract $panel;

<<<<<<< HEAD
    public function __construct(string $action, PanelContract $panel) {
=======
    public function __construct(string $action, PanelContract $panel)
    {
>>>>>>> ede0df7 (first)
        $this->action = $action;
        $this->panel = $panel;
    }

<<<<<<< HEAD
    public function render(): View {
=======
    public function render(): View
    {
>>>>>>> ede0df7 (first)
        return view()->make('theme::components.form.panel');
    }
}
