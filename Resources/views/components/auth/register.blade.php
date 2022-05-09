<x-guest-layout>
    <x-authentication.card>
        <x-slot name="logo">
            <x-authentication.card-logo />
        </x-slot>

        <x-validation.errors class="mb-3" />

        <div class="card-body">
            <form method="POST" action="{{ route('register') }}">
                @csrf

                <div class="mb-3">
                    <x-label value="{{ __('Name') }}" />

                    <x-input class="{{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name"
                        :value="old('username')" required autofocus autocomplete="name" />
                    <x-input.error for="name">
                        </x-jet-input-error>
                </div>

                <div class="mb-3">
                    <x-label value="{{ __('Email') }}" />

                    <x-input class="{{ $errors->has('email') ? 'is-invalid' : '' }}" type="email" name="email"
                        :value="old('email')" required />
                    <x-input.error for="email">
                        </x-jet-input-error>
                </div>

                <div class="mb-3">
                    <x-label value="{{ __('Password') }}" />

                    <x-input class="{{ $errors->has('password') ? 'is-invalid' : '' }}" type="password" name="password"
                        required autocomplete="new-password" />
                    <x-input.error for="password">
                        </x-jet-input-error>
                </div>

                <div class="mb-3">
                    <x-label value="{{ __('Confirm Password') }}" />

                    <x-input class="form-control" type="password" name="password_confirmation" required
                        autocomplete="new-password" />
                </div>

                @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                    <div class="mb-3">
                        <div class="custom-control custom-checkbox">
                            <x-input type="checkbox" id="terms" name="terms" />
                            <label class="custom-control-label" for="terms">
                                {!! __('I agree to the :terms_of_service and :privacy_policy', [
    'terms_of_service' => '<a target="_blank" href="' . route('terms.show') . '">' . __('Terms of Service') . '</a>',
    'privacy_policy' => '<a target="_blank" href="' . route('policy.show') . '">' . __('Privacy Policy') . '</a>',
]) !!}
                            </label>
                        </div>
                    </div>
                @endif

                <div class="mb-0">
                    <div class="d-flex justify-content-end align-items-baseline">
                        <a class="text-muted mr-3 text-decoration-none" href="{{ route('login') }}">
                            {{ __('Already registered?') }}
                        </a>

                        <x-button>
                            {{ __('Register') }}
                            </x-jet-button>
                    </div>
                </div>
            </form>
        </div>
        </x-jet-authentication-card>
</x-guest-layout>
