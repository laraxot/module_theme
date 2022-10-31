<?php

declare(strict_types=1);

namespace Modules\Theme\Http\Livewire\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

/**
 * Undocumented class.
 */
class LoginModal extends Component
{
    public string $username = '';
    public string $password = '';
    public string $currentPath = '';

    public function render(): \Illuminate\Contracts\Support\Renderable
    {
        $views = [
            'pub_theme::livewire.auth.login-modal',
            'theme::livewire.auth.login-modal',
        ];

        return view()->first($views);
    }

    /**
     * Undocumented function.
     *
     * @return void
     */
    public function mount()
    {
        // dddx([request()->path(), request()->fullUrl()]);
        // dddx([request(), get_class_methods(request())]);
        // dddx(request()->getRequestUri());
        // $this->currentPath = request()->path();
        $this->currentPath = request()->getRequestUri();
    }

    protected array $rules = [
        'username' => 'required|email|string',
        'password' => 'required|string',
    ];

    /**
     * @return \Illuminate\Http\Response|void|\Illuminate\Http\RedirectResponse
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

    /**
     * Attempt to log the user into the application.
     *
     * @return bool
     */
    protected function attemptLogin()
    {
        return $this->guard()->attempt(
            ['email' => $this->username, 'password' => $this->password]
        );
    }

    /**
     * Get the guard to be used during authentication.
     *
     * @return \Illuminate\Contracts\Auth\StatefulGuard
     */
    protected function guard()
    {
        return Auth::guard();
    }
}
