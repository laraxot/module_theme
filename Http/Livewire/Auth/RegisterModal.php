<?php
/**
 * https://thecodelearners.com/laravel-livewire-login-dynamic-registration-form-for-multiple-roles/
 * https://itwebtuts.blogspot.com/2021/06/laravel-livewire-login-register-example.html
 * https://xpertphp.com/laravel-7-livewire-login-registration-example-tutorial/
 * https://cerwyn.medium.com/dynamic-interfaces-using-livewire-and-laravel-for-registration-and-login-forms-26df0e3e578f
 * https://www.itsolutionstuff.com/post/laravel-8-auth-with-livewire-jetstream-tutorialexample.html.
 */

declare(strict_types=1);

namespace Modules\Theme\Http\Livewire\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Validation\Rules;
use Livewire\Component;

/**
 * Undocumented class.
 */
class RegisterModal extends Component {
    public string $username = '';
    public string $email = '';
    public string $password = '';
    public string $password_confirmation = '';

    public string $currentPath = '';

    public function render(): \Illuminate\Contracts\Support\Renderable {
        $views = [
            'pub_theme::livewire.auth.register-modal',
            'theme::livewire.auth.register-modal',
        ];

        return view()->first($views);
    }

    /**
     * @return void
     */
    public function mount() {
        $this->currentPath = request()->path();
    }

    // https://stephenreescarter.net/talks/hacking-laravel/
    protected array $rules = [
        // 'username' => 'required|string',
        'username' => ['required', 'string', 'max:255'],
        // 'email' => 'required|email|string',
        'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        // 'password' => ['required', 'confirmed', Rules\Password::min(8)->uncompromised()],
        // 'password' => ['required', 'confirmed'],
        'password' => 'required|string|min:5|confirmed',
        // 'confirm_password' => 'required|same:password',
        // Constant expression contains invalid operations
        // 'password' => ['required', 'confirmed', Rules\Password::defaults()],
    ];

    /**
     * @return \Illuminate\Http\Response|void|\Illuminate\Http\RedirectResponse
     */
    public function register(Request $request) {
        $data = $this->validate();

        $data['password'] = Hash::make($data['password']);
        /**
         * @var string
         */
        $user_class = config('auth.providers.users.model');
        $user = app($user_class);

        $user = $user->create($data);
        $profile = $user->profile()->create();
        $post_data = [
            'title' => $data['username'],
            'guid' => Str::slug($data['username']),
            'lang' => app()->getLocale(),
        ];
        $post = $profile->post()->create($post_data);

        Auth::login($user);

        return redirect()->intended($this->currentPath);
    }
}