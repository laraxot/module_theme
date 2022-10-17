<?php

declare(strict_types=1);

namespace Modules\Theme\View\Components\User\Security;

use Illuminate\Contracts\Support\Renderable;
use Modules\Xot\View\Components\XotBaseComponent;

/**
 * Class Item.
 * nb: funziona in directorybs5 ma non in adminlte.
 */
class Item extends XotBaseComponent {
    public array $attrs;

<<<<<<< HEAD
    public function __construct(string $id, string $operativesystem, string $browser, string $iplocation, string $time) {
=======
    public function __construct(string $id = 'users-security-item-0', string $operativesystem, string $browser, string $iplocation, string $time) {
>>>>>>> ede0df7 (first)
        $this->attrs['id'] = $id;
        $this->attrs['operativesystem'] = $operativesystem;
        $this->attrs['browser'] = $browser;
        $this->attrs['iplocation'] = $iplocation;
        $this->attrs['time'] = $time;
    }

    public function render(): Renderable {
<<<<<<< HEAD
        /**
         * @phpstan-var view-string
         */
=======
>>>>>>> ede0df7 (first)
        $view = 'theme::components.users.security.item';
        $view_params = [
            'view' => $view,
        ];

        return view()->make($view, $view_params);
    }
}
