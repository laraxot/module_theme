<?php

declare(strict_types=1);

namespace Modules\Theme\View\Components;

use Illuminate\View\Component;

/**
 * Class ThankYou.
 */
<<<<<<< HEAD
class ThankYou extends Component {
=======
class ThankYou extends Component
{
>>>>>>> ede0df7 (first)
    public bool $showSuccess = true;

    /**
     * Create a new component instance.
     *
     * @return void
     */
<<<<<<< HEAD
    public function __construct() {
    }

    public function getLocalStorage(string $param): string {
=======
    public function __construct()
    {
    }

    public function getLocalStorage(string $param): string
    {
>>>>>>> ede0df7 (first)
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
<<<<<<< HEAD
    public function render(): \Illuminate\Contracts\Support\Renderable {
=======
    public function render():\Illuminate\Contracts\Support\Renderable
    {
>>>>>>> ede0df7 (first)
        return view()->make('pub_theme::components.thank_you');
    }
}
