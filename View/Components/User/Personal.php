<?php

declare(strict_types=1);

namespace Modules\Theme\View\Components\User;

use Illuminate\Contracts\Support\Renderable;
use Modules\Xot\View\Components\XotBaseComponent;

/**
 * Class Container.
 * nb: funziona in directorybs5 ma non in adminlte.
 */
class Personal extends XotBaseComponent {
    public array $attrs;

    public function __construct(string $id = 'user-personal-0', string $fullname, string $birthdate, string $email,
    string $phone, string $address, string $city, string $state, string $zip, string $apt) {
        $this->attrs['id'] = $id;
        $this->attrs['fullname'] = $fullname;
        $this->attrs['birthdate'] = $birthdate;
        $this->attrs['email'] = $email;
        $this->attrs['phone'] = $phone;
        $this->attrs['address'] = $address;
        $this->attrs['city'] = $city;
        $this->attrs['state'] = $state;
        $this->attrs['zip'] = $zip;
        $this->attrs['apt'] = $apt;
    }

    public function render(): Renderable {
        $view = 'theme::components.users.personal';
        $view_params = [
            'view' => $view,
        ];

        return view()->make($view, $view_params);
    }
}
