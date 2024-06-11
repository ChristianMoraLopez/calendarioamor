<x-guest-layout>

    <script>
        window.onload = function() {
            document.body.classList.add('loaded');
        }
    </script>
      <div class="background">
        <div class="shape"></div>
        <div class="shape"></div>
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ secure_url(route('login')) }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="input-field block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="input-error mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />
            <x-text-input id="password" class="input-field block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />
            <x-input-error :messages="$errors->get('password')" class="input-error mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800" name="remember">
                <span class="ms-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-end mt-4">
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <x-primary-button class="button ms-3">
                {{ __('Log in') }}
            </x-primary-button>
        </div>
    </form>



<!-- Styles -->
<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap');

    body {
        background-color: #080710;
        font-family: 'Poppins', sans-serif;
        margin: 0;
        padding: 0;
        display: flex;
        align-items: center;
        justify-content: center;
        height: 100vh;
        opacity: 0;
        transition: opacity 1s ease-in-out;
    }

    .Logo {
        text-align: center;
    }

    .background {
        width: 430px;
        height: 520px;
        position: absolute;
        transform: translate(-50%, -50%);
        left: 50%;
        top: 50%;
        transition: opacity 0.5s ease-in-out;
    }

    .background .shape {
        height: 200px;
        width: 200px;
        position: absolute;
        border-radius: 50%;
    }

    .shape:first-child {
        background: linear-gradient(#1845ad, #23a2f6);
        left: -80px;
        top: -80px;
    }

    .shape:last-child {
        background: linear-gradient(to right, #ff512f, #f09819);
        right: -30px;
        bottom: -80px;
    }

    form {
        max-width: 400px;
        width: 100%;
        padding: 50px 35px;
        background: rgba(255, 255, 255, 0.13);
        position: absolute;
        transform: translate(-50%, -50%);
        top: 50%;
        left: 50%;
        border-radius: 10px;
        backdrop-filter: blur(10px);
        border: 2px solid rgba(255, 255, 255, 0.1);
        box-shadow: 0 0 40px rgba(8, 7, 16, 0.6);
        color: #ffffff;
        transition: opacity 0.5s ease-in-out;
        opacity: 1;
    }

    .input-group {
        margin-top: 20px;
    }

    .input-group:first-of-type {
        margin-top: 0;
    }

    label {
        display: block;
        margin-top: 30px;
        font-size: 16px;
        font-weight: 500;
        color: #ffffff;
    }

    .input-field {
        width: 100%;
        padding: 10px;
        background: rgba(255, 255, 255, 0.07);
        border-radius: 3px;
        border: 1px solid rgba(255, 255, 255, 0.1);
        color: #e5e5e5;
        font-size: 14px;
        font-weight: 300;
        transition: background 0.3s, border-color 0.3s;
    }

    .input-field:focus {
        background: rgba(255, 255, 255, 0.15);
        border-color: #ffffff;
        outline: none;
    }

    .input-error {
        margin-top: 8px;
        font-size: 12px;
        color: #f44336;
    }

    .button {
        width: 100%;
        padding: 15px;
        background-color: #ffffff;
        color: #080710;
        border: none;
        border-radius: 5px;
        font-size: 18px;
        font-weight: 600;
        cursor: pointer;
        transition: background-color 0.3s, transform 0.3s;
        margin-top: 20px;
    }

    .button:hover {
        background-color: #e5e5e5;
        transform: scale(1.05);
    }

    .underline {
        color: #e5e5e5;
        text-decoration: none;
    }

    .underline:hover {
        color: #ffffff;
    }

    .flex {
        display: flex;
        align-items: center;
        justify-content: space-between;
    }

    .mt-4 {
        margin-top: 1rem;
    }

    body.loaded {
        opacity: 1;
    }

</style>

</x-guest-layout>
