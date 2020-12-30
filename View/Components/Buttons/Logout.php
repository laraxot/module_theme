<?php

declare(strict_types=1);

namespace Modules\Theme\View\Components\Buttons;

use Illuminate\Contracts\View\View;
use Modules\Xot\View\Components\XotBaseComponent;

class Logout extends XotBaseComponent {
    /** @var string */
    public $action;
    public $attrs = ['aa' => 'bb'];

    public function __construct(string $action = null) {
        $this->action = $action ?? route('logout');
    }

    public function render(): View {
        $view = $this->getView();
        $view_params = [
            'view' => $view,
        ];

        return view($view, $view_params);
    }
}
