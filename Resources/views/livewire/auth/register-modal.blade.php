<div>
    <div class="modal fade" id="registerModal" tabindex="-1" role="dialog" aria-labelledby="registerModal"
        aria-hidden="true" wire:key="login-model" wire:ignore.self>
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title" id="registerModal">{{ __('Register') }}</h1>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <svg xmlns="http://www.w3.org/2000/svg" version="1.1" id="Layer_1" x="0px" y="0px"
                            viewBox="0 0 512 512" xml:space="preserve" width="16px" height="16px">
                            <g>
                                <path
                                    d="M505.943,6.058c-8.077-8.077-21.172-8.077-29.249,0L6.058,476.693c-8.077,8.077-8.077,21.172,0,29.249    C10.096,509.982,15.39,512,20.683,512c5.293,0,10.586-2.019,14.625-6.059L505.943,35.306    C514.019,27.23,514.019,14.135,505.943,6.058z"
                                    fill="currentColor"></path>
                            </g>
                            <g>
                                <path
                                    d="M505.942,476.694L35.306,6.059c-8.076-8.077-21.172-8.077-29.248,0c-8.077,8.076-8.077,21.171,0,29.248l470.636,470.636    c4.038,4.039,9.332,6.058,14.625,6.058c5.293,0,10.587-2.019,14.624-6.057C514.018,497.866,514.018,484.771,505.942,476.694z"
                                    fill="currentColor"></path>
                            </g>
                        </svg>
                    </button>
                </div>
                <form wire:submit.prevent="register">
                    <div class="modal-body">
                        @if (session()->has('error'))
                            <div class="alert alert-danger">
                                {{ session('error') }}
                            </div>
                        @endif

                        <div class="mb-3">
                            <label for="usernameInput" class="form-label fw-bold">{{ __('Username') }}</label>
                            <input type="text" class="form-control @error('username') is-invalid @enderror"
                                id="usernameInput" name="username" placeholder="Your Username"
                                wire:model.lazy="username" autocomplete="username">

                            @error('username')
                                <div id="invalidEmailFeedback" class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="emailInput" class="form-label fw-bold">{{ __('E-Mail Address') }}</label>
                            <input type="text" class="form-control @error('email') is-invalid @enderror" id="emailInput"
                                name="email" placeholder="Your email" wire:model.lazy="email">

                            @error('email')
                                <div id="invalidEmailFeedback" class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="passwordInput" class="form-label fw-bold">{{ __('Password') }}</label>
                            <input type="password" class="form-control @error('password') is-invalid @enderror"
                                id="passwordInput" name="password" placeholder="Your Password"
                                wire:model.lazy="password" autocomplete="new-password">

                            @error('password')
                                <div id="invalidEmailFeedback" class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="password_confirmation"
                                class="form-label fw-bold">{{ __('Confirm Password') }}</label>
                            <input type="password"
                                class="form-control @error('password_confirmation') is-invalid @enderror"
                                id="password_confirmation" name="password_confirmation" placeholder="Confirm Password"
                                wire:model.lazy="password_confirmation" autocomplete="new-password">

                            @error('password_confirmation')
                                <div id="invalidEmailFeedback" class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror

                        </div>




                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary text-white">{{ __('Register') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
