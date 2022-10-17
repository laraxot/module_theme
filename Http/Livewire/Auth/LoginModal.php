<?php

declare(strict_types=1);

namespace Modules\Theme\Http\Livewire\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

/**
 * Undocumented class.
 */
<<<<<<< HEAD
class LoginModal extends Component {
=======
class LoginModal extends Component
{
>>>>>>> ede0df7 (first)
    public string $username = '';
    public string $password = '';
    public string $currentPath = '';

<<<<<<< HEAD
    public function render(): \Illuminate\Contracts\Support\Renderable {
=======
    /**
     */
    public function render():\Illuminate\Contracts\Support\Renderable
    {
>>>>>>> ede0df7 (first)
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
<<<<<<< HEAD
    public function mount() {
        // dddx([request()->path(), request()->fullUrl()]);
        // dddx([request(), get_class_methods(request())]);
        // dddx(request()->getRequestUri());
        // $this->currentPath = request()->path();
=======
    public function mount()
    {
        //dddx([request()->path(), request()->fullUrl()]);
        //dddx([request(), get_class_methods(request())]);
        //dddx(request()->getRequestUri());
        //$this->currentPath = request()->path();
>>>>>>> ede0df7 (first)
        $this->currentPath = request()->getRequestUri();
    }

    protected array $rules = [
        'username' => 'required|email|string',
        'password' => 'required|string',
    ];

    /**
     * @return \Illuminate\Http\Response|void|\Illuminate\Http\RedirectResponse
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

    /**
     * Attempt to log the user into the application.
     *
     * @return bool
     */
<<<<<<< HEAD
    protected function attemptLogin() {
=======
    protected function attemptLogin()
    {
>>>>>>> ede0df7 (first)
        return $this->guard()->attempt(
            ['email' => $this->username, 'password' => $this->password]
        );
    }

    /**
     * Get the guard to be used during authentication.
     *
     * @return \Illuminate\Contracts\Auth\StatefulGuard
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
