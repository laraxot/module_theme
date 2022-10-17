<?php

declare(strict_types=1);

namespace Modules\Theme\Http\Livewire\Auth;

use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;
use Livewire\Component;

<<<<<<< HEAD
class ResetPassword extends Component {
=======
class ResetPassword extends Component
{
>>>>>>> ede0df7 (first)
    public string $password;

    /**
     * @return void
     */
<<<<<<< HEAD
    public function mount() {
=======
    public function mount()
    {
>>>>>>> ede0df7 (first)
    }

    protected array $rules = [
        'password' => 'required|confirmed|min:5',
    ];

    /**
     * @return \Illuminate\Http\Response|void|\Illuminate\Http\RedirectResponse
     */
<<<<<<< HEAD
    public function changePassword() {
        $data = $this->validate();

        /**
         * @var string
         */
        $status = Password::reset(
            // $request->only('email', 'password', 'password_confirmation', 'token'),
=======
    public function changePassword()
    {
        $data = $this->validate();

        $status = Password::reset(
            //$request->only('email', 'password', 'password_confirmation', 'token'),
>>>>>>> ede0df7 (first)
            ['password' => $this->password],
            function ($user, $password) {
                $user->forceFill(
                    [
<<<<<<< HEAD
                        'password' => Hash::make($password),
=======
                    'password' => Hash::make($password),
>>>>>>> ede0df7 (first)
                    ]
                )->setRememberToken(Str::random(60));

                $user->save();

<<<<<<< HEAD
                // questo a cosa mi dovrebbe servire?
                // event(new PasswordReset($user));
=======
                //questo a cosa mi dovrebbe servire?
                //event(new PasswordReset($user));
>>>>>>> ede0df7 (first)
            }
        );

        return Password::PASSWORD_RESET === $status
                ? redirect()->route('login')->with('status', __($status))
                : back()->withErrors(['email' => [__($status)]]);

<<<<<<< HEAD
        // return 'wip';
    }

    public function render(): \Illuminate\Contracts\Support\Renderable {
=======
        //return 'wip';
    }

    /**
     */
    public function render():\Illuminate\Contracts\Support\Renderable
    {
>>>>>>> ede0df7 (first)
        $views = [
            'pub_theme::livewire.auth.reset-password',
            'theme::livewire.auth.reset-password',
        ];

        return view()->first($views);
    }
}
