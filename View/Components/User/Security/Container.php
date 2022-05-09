<?php

declare(strict_types=1);

namespace Modules\Theme\View\Components\User\Security;

use Illuminate\Contracts\Support\Renderable;
use Modules\Xot\View\Components\XotBaseComponent;

/**
 * Class Container.
 * nb: funziona in directorybs5 ma non in adminlte.
 */
class Container extends XotBaseComponent {
    public array $attrs;

    public function __construct(string $id = 'users-security-container-0') {
        $this->attrs['id'] = $id;
    }

    public function render(): Renderable {
        $view = 'theme::components.users.security.container';
        $view_params = [
            'view' => $view,
        ];

        return view()->make($view, $view_params);
    }
}
