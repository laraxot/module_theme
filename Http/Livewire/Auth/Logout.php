<?php

declare(strict_types=1);

namespace Modules\Theme\Http\Livewire\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Logout extends Component {
    public ?string $class;

    public function mount(?string $class = null): void {
        if (null !== $class) {
            $this->class = $class;
        }
    }

    /**
     * @return \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse
     */
    public function logout(Request $request) {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }

    public function render(): \Illuminate\Contracts\Support\Renderable {
        /**
         * @phpstan-var view-string
         */
        $view = 'theme::livewire.auth.logout';
        $view_params = [
            'view' => $view,
        ];

        return view($view, $view_params);
    }
}
