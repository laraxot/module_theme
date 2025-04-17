<?php

declare(strict_types=1);

namespace Modules\Theme\View\Components;

use Illuminate\View\Component;

/**
 * Class ThankYou.
 */
class ThankYou extends Component
{
    public bool $showSuccess = true;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    public function getLocalStorage(string $param): string
    {
        $local_storage = [
            'first_name' => 'Antonio',
            'last_name' => 'Rossi',
            'mobile_phone' => '1234562258',
        ];

        return $local_storage[$param];
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): \Illuminate\Contracts\Support\Renderable
    {
        return view()->make('pub_theme::components.thank_you');
    }
}
