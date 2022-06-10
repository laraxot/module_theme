<?php

declare(strict_types=1);

namespace Modules\Theme\Http\Livewire\Auth;

use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;
use Livewire\Component;

class ResetPassword extends Component {
    public string $password;

    /**
     * @return void
     */
    public function mount() {
    }

    protected array $rules = [
        'password' => 'required|confirmed|min:5',
    ];

    /**
     * @return \Illuminate\Http\Response|void|\Illuminate\Http\RedirectResponse
     */
    public function changePassword() {
        $data = $this->validate();

        /**
         * @var string
         */
        $status = Password::reset(
            // $request->only('email', 'password', 'password_confirmation', 'token'),
            ['password' => $this->password],
            function ($user, $password) {
                $user->forceFill(
                    [
                        'password' => Hash::make($password),
                    ]
                )->setRememberToken(Str::random(60));

                $user->save();

                // questo a cosa mi dovrebbe servire?
                // event(new PasswordReset($user));
            }
        );

        return Password::PASSWORD_RESET === $status
                ? redirect()->route('login')->with('status', __($status))
                : back()->withErrors(['email' => [__($status)]]);

        // return 'wip';
    }

    public function render(): \Illuminate\Contracts\Support\Renderable {
        $views = [
            'pub_theme::livewire.auth.reset-password',
            'theme::livewire.auth.reset-password',
        ];

        return view()->first($views);
    }
}