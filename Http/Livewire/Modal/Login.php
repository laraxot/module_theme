<?php

declare(strict_types=1);

/**
 * register da prendere spunto..
 * https://blog.quickadminpanel.com/laravel-login-and-register-forms-in-modal-bootstrap-popups/.
 */

namespace Modules\Theme\Http\Livewire\Modal;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Livewire\Component;

class Login extends Component
{
    public string $username = '';
    public string $password = '';
    public string $currentPath = '';

    protected array $rules = [
        'username' => 'required|email|string',
        'password' => 'required|string',
    ];

    public function mount(): void
    {
        // $this->currentPath = request()->path();
        $this->currentPath = request()->getRequestUri();
    }

    public function render(): View
    {
        /**
         * @phpstan-var view-string
         */
        $view = 'theme::livewire.modal.login';
        $view_params = [
            'view' => $view,
        ];

        return view($view, $view_params);
    }

    /**
     * @return \Illuminate\Http\RedirectResponse|void
     */
    public function login(Request $request)
    {
        $this->validate();

        if ($this->attemptLogin()) {
            // Login Success
            $request->session()->regenerate();

            return redirect()->intended($this->currentPath);
        }

        // Login Failure
        session()->flash('error', 'These credentials do not match our records.');

        return;
    }

    protected function attemptLogin(): bool
    {
        return $this->guard()->attempt(
            ['email' => $this->username, 'password' => $this->password]
        );
    }

    /**
     * Get the guard to be used during authentication.
     *
     * @return \Illuminate\Contracts\Auth\Guard|\Illuminate\Contracts\Auth\StatefulGuard
     */
    protected function guard()
    {
        return Auth::guard();
    }
}
