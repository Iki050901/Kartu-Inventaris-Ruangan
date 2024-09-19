<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <div class="row" style="height: 100vh;">
        <div class="logo-login">
            <img src="{{ asset('img/Vector.svg') }}" alt="logo" class="img-fluid mb-3">
            <img src="{{ asset('img/KARTU INVENTARIS RUANGAN.svg') }}" alt="Kartu Inventaris Ruangan" class="img-fluid">
        </div>
        <div class="form-login">
            <h1>LOGIN</h1>
            <form method="POST" action="{{ route('login') }}">
                @csrf

                <!-- Email Address -->
                <div>
                    <x-input-label for="email" :value="__('Email')" />
                    <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" placeholder="Enter your username/email" />
                </div>

                <!-- Password -->
                <div class="password-container">
                    <x-input-label for="password" :value="__('Password')" />

                    <div class="password-input-container">
                        <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password" placeholder="Enter your password" />

                        <div class="input-group">
                            <svg width="30" height="33" viewBox="0 0 32 33" fill="none" id="showIcon" class="password-toggle" style="display: block; margin-top:8px" xmlns="http://www.w3.org/2000/svg">
                                <path d="M2.66666 7.52671L4.37333 5.83337L26.6667 28.1267L24.9733 29.8334L20.8667 25.7267C19.3333 26.2334 17.7067 26.5 16 26.5C9.33333 26.5 3.63999 22.3534 1.33333 16.5C2.25333 14.1534 3.71999 12.0867 5.58666 10.4467L2.66666 7.52671ZM16 12.5C17.0609 12.5 18.0783 12.9215 18.8284 13.6716C19.5786 14.4218 20 15.4392 20 16.5C20 16.9667 19.92 17.42 19.7733 17.8334L14.6667 12.7267C15.08 12.58 15.5333 12.5 16 12.5ZM16 6.50004C22.6667 6.50004 28.36 10.6467 30.6667 16.5C29.5733 19.2734 27.72 21.6734 25.3333 23.42L23.44 21.5134C25.2533 20.26 26.7467 18.5534 27.76 16.5C25.56 12.02 21.0133 9.16671 16 9.16671C14.5467 9.16671 13.12 9.40671 11.7867 9.83337L9.73333 7.79337C11.6533 6.96671 13.7733 6.50004 16 6.50004ZM4.23999 16.5C6.43999 20.98 10.9867 23.8334 16 23.8334C16.92 23.8334 17.8267 23.74 18.6667 23.5534L15.6267 20.5C13.72 20.3 12.2 18.78 12 16.8734L7.46666 12.3267C6.14666 13.46 5.03999 14.8734 4.23999 16.5Z" fill="black" />
                            </svg>
                            <svg width="30" height="33" viewBox="0 0 24 24" fill="none" id="hideIcon" style="display: none; margin-top:8px" class="password-toggle" xmlns="http://www.w3.org/2000/svg">
                                <path d="M12 9C12.7956 9 13.5587 9.31607 14.1213 9.87868C14.6839 10.4413 15 11.2044 15 12C15 12.7956 14.6839 13.5587 14.1213 14.1213C13.5587 14.6839 12.7956 15 12 15C11.2044 15 10.4413 14.6839 9.87868 14.1213C9.31607 13.5587 9 12.7956 9 12C9 11.2044 9.31607 10.4413 9.87868 9.87868C10.4413 9.31607 11.2044 9 12 9ZM12 4.5C17 4.5 21.27 7.61 23 12C21.27 16.39 17 19.5 12 19.5C7 19.5 2.73 16.39 1 12C2.73 7.61 7 4.5 12 4.5ZM3.18 12C4.83 15.36 8.24 17.5 12 17.5C15.76 17.5 19.17 15.36 20.82 12C19.17 8.64 15.76 6.5 12 6.5C8.24 6.5 4.83 8.64 3.18 12Z" fill="black" />
                            </svg>
                        </div>
                    </div>

                    <x-input-error :messages="$errors->get('email')" class="msg-error-login" />
                    <x-input-error :messages="$errors->get('password')" class="msg-error-login" />
                </div>

                <!-- Remember Me -->
                <!-- <div class="block mt-4">
                    <label for="remember_me" class="inline-flex items-center">
                        <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                        <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                    </label>
                </div> -->

                <div class="flex items-center justify-end mt-4">
                    <!-- @if (Route::has('password.request'))
                        <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                            {{ __('Forgot your password?') }}
                        </a>
                    @endif -->

                    <x-primary-button class="btn-submit">
                        {{ __('Masuk') }}
                    </x-primary-button>
                </div>
            </form>
        </div>
    </div>
</x-guest-layout>

<style>
    .password-input-container {
        position: relative;
    }

    .password-toggle {
        position: absolute;
        top: 50%;
        right: 10px;
        transform: translateY(-50%);
        cursor: pointer;
    }
</style>

<script>
    const showIcon = document.getElementById('showIcon');
    const hideIcon = document.getElementById('hideIcon');
    const passwordInput = document.getElementById('password');

    function togglePassword() {
        const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
        passwordInput.setAttribute('type', type);
        showIcon.style.display = type === 'password' ? 'block' : 'none';
        hideIcon.style.display = type === 'password' ? 'none' : 'block';
    }

    showIcon.addEventListener('click', togglePassword);
    hideIcon.addEventListener('click', togglePassword);
</script>