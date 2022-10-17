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

<<<<<<< HEAD
class Login extends Component {
=======
class Login extends Component
{
>>>>>>> ede0df7 (first)
    public string $username = '';
    public string $password = '';
    public string $currentPath = '';

    protected array $rules = [
        'username' => 'required|email|string',
        'password' => 'required|string',
    ];

<<<<<<< HEAD
    public function mount(): void {
        // $this->currentPath = request()->path();
        $this->currentPath = request()->getRequestUri();
    }

    public function render(): View {
        /**
         * @phpstan-var view-string
         */
=======
    public function mount(): void
    {
        //$this->currentPath = request()->path();
        $this->currentPath = request()->getRequestUri();
    }

    public function render(): View
    {
>>>>>>> ede0df7 (first)
        $view = 'theme::livewire.modal.login';
        $view_params = [
            'view' => $view,
        ];

        return view($view, $view_params);
    }

    /**
     * @return \Illuminate\Http\RedirectResponse|void
     */
<<<<<<< HEAD
    public function login(Request $request) {
        $this->validate();

        if ($this->attemptLogin()) {
            // Login Success
=======
    public function login(Request $request)
    {
        $this->validate();

        if ($this->attemptLogin()) {
            //Login Success
>>>>>>> ede0df7 (first)
            $request->session()->regenerate();

            return redirect()->intended($this->currentPath);
        }

<<<<<<< HEAD
        // Login Failure
=======
        //Login Failure
>>>>>>> ede0df7 (first)
        session()->flash('error', 'These credentials do not match our records.');

        return;
    }

<<<<<<< HEAD
    protected function attemptLogin(): bool {
=======
    protected function attemptLogin(): bool
    {
>>>>>>> ede0df7 (first)
        return $this->guard()->attempt(
            ['email' => $this->username, 'password' => $this->password]
        );
    }

    /**
     * Get the guard to be used during authentication.
     *
     * @return \Illuminate\Contracts\Auth\Guard|\Illuminate\Contracts\Auth\StatefulGuard
     */
<<<<<<< HEAD
    protected function guard() {
=======
    protected function guard()
    {
>>>>>>> ede0df7 (first)
        return Auth::guard();
    }
}
