<?php

declare(strict_types=1);

namespace Modules\Theme\View\Components\Buttons;

use Illuminate\Contracts\View\View;
use Modules\Xot\View\Components\XotBaseComponent;

/**
 * Class Logout.
 */
class Logout extends XotBaseComponent {
    public string $action;
    public array $attrs = ['aa' => 'bb'];

    public function __construct(string $action = null) {
        $this->action = $action ?? route('logout');
    }

    public function render(): View {
        //$view = $this->getView();
        $view = 'theme::components.buttons.logout';
        $view_params = [
            'view' => $view,
        ];

        return view($view, $view_params);
    }
}