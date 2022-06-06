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

    public function __construct(string $id, string $operativesystem, string $browser, string $iplocation, string $time) {
        $this->attrs['id'] = $id;
        $this->attrs['operativesystem'] = $operativesystem;
        $this->attrs['browser'] = $browser;
        $this->attrs['iplocation'] = $iplocation;
        $this->attrs['time'] = $time;
    }

    public function render(): Renderable {
        /** 
        * @phpstan-var view-string
        */
        $view = 'theme::components.users.security.item';
        $view_params = [
            'view' => $view,
        ];

        return view()->make($view, $view_params);
    }
}
