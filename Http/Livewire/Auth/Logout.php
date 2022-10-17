<?php

declare(strict_types=1);

namespace Modules\Theme\Http\Livewire\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

<<<<<<< HEAD
class Logout extends Component {
    public ?string $class;

    public function mount(?string $class = null): void {
=======
class Logout extends Component
{
    public ?string $class;

    public function mount(?string $class = null): void
    {
>>>>>>> ede0df7 (first)
        if (null !== $class) {
            $this->class = $class;
        }
    }

    /**
     * @return \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse
     */
<<<<<<< HEAD
    public function logout(Request $request) {
=======
    public function logout(Request $request)
    {
>>>>>>> ede0df7 (first)
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }

<<<<<<< HEAD
    public function render(): \Illuminate\Contracts\Support\Renderable {
        /**
         * @phpstan-var view-string
         */
=======
    /**
     */
    public function render():\Illuminate\Contracts\Support\Renderable
    {
>>>>>>> ede0df7 (first)
        $view = 'theme::livewire.auth.logout';
        $view_params = [
            'view' => $view,
        ];

        return view($view, $view_params);
    }
}
