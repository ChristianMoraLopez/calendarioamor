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
    <form method="POST" action="{{ route('register') }}">
        @csrf
        <div class="Logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </div>

        <!-- Name -->
        <div class="input-group">
            <label for="name">Name</label>
            <input id="name" class="input-field" type="text" name="name" value="{{ old('name') }}" required autofocus autocomplete="name" placeholder="Enter your name">
            <x-input-error :messages="$errors->get('name')" class="input-error" />
        </div>

        <!-- Email Address -->
        <div class="input-group mt-4">
            <label for="email">Email</label>
            <input id="email" class="input-field" type="email" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Enter your email">
            <x-input-error :messages="$errors->get('email')" class="input-error" />
        </div>

        <!-- Password -->
        <div class="input-group mt-4">
            <label for="password">Password</label>
            <input id="password" class="input-field" type="password" name="password" required autocomplete="new-password" placeholder="Enter your password">
            <x-input-error :messages="$errors->get('password')" class="input-error" />
        </div>

        <!-- Confirm Password -->
        <div class="input-group mt-4">
            <label for="password_confirmation">Confirm Password</label>
            <input id="password_confirmation" class="input-field" type="password" name="password_confirmation" required autocomplete="new-password" placeholder="Confirm your password">
            <x-input-error :messages="$errors->get('password_confirmation')" class="input-error" />
        </div>

        <div class="flex items-center justify-between mt-4">
            <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150" href="{{ secure_url(route('login')) }}">
                Already registered?
            </a>

            <button type="submit" class="button">Register</button>
        </div>
    </form>



</x-guest-layout>
