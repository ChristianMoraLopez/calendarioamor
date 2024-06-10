<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />
            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
            <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ml-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>

    <!-- Styles -->
    <style>
        body {
            background-color: #080710;
            font-family: 'Poppins', sans-serif;
        }

        form {
            max-width: 400px;
            margin: auto;
            padding: 50px 35px;
            background-color: rgba(255, 255, 255, 0.13);
            border-radius: 10px;
            backdrop-filter: blur(10px);
            border: 2px solid rgba(255, 255, 255, 0.1);
            box-shadow: 0 0 40px rgba(8, 7, 16, 0.6);
            color: #ffffff;
        }

        form * {
            letter-spacing: 0.5px;
            outline: none;
            border: none;
        }

        form h3 {
            font-size: 32px;
            font-weight: 500;
            line-height: 42px;
            text-align: center;
            color: #ffffff;
        }

        label {
            display: block;
            margin-top: 30px;
            font-size: 16px;
            font-weight: 500;
        }

        input {
            display: block;
            width: 100%;
            height: 50px;
            background-color: rgba(255, 255, 255, 0.07);
            border-radius: 3px;
            padding: 0 10px;
            margin-top: 8px;
            font-size: 14px;
            font-weight: 300;
            color: #e5e5e5;
        }

        ::placeholder {
            color: #e5e5e5;
        }

        button {
            width: 100%;
            background-color: #ffffff;
            color: #080710;
            padding: 15px 0;
            font-size: 18px;
            font-weight: 600;
            border-radius: 5px;
            cursor: pointer;
            margin-top: 50px;
            border: none;
            outline: none;
        }



        .underline {
            color: #e5e5e5;
        }

        .flex {
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .ml-4 {
            margin-left: 1rem;
        }

        .mt-1 {
            margin-top: 0.25rem;
        }

        .mt-2 {
            margin-top: 0.5rem;
        }

        .mt-4 {
            margin-top: 1rem;
        }

        .block {
            display: block;
        }

        .w-full {
            width: 100%;
        }

        .text-gray-600 {
            color: #718096;
        }

        .dark\:text-gray-400 {
            color: #a0aec0;
        }

        .hover\:text-gray-900:hover {
            color: #1a202c;
        }

        .dark\:hover\:text-gray-100:hover {
            color: #f7fafc;
        }

        .rounded-md {
            border-radius: 0.375rem;
        }

        .focus\:outline-none {
            outline: 2px solid transparent;
            outline-offset: 2px;
        }

        .focus\:ring-2 {
            box-shadow: 0 0 0 2px rgba(0, 0, 0, 0.1);
        }
        .focus\:ring-offset-2 {
            box-shadow: 0 0 0 2px rgba(0, 0, 0, 0.1);
        }

        .focus\:ring-indigo-500 {
            box-shadow: 0 0 0 2px #667eea;
        }

        .dark\:focus\:ring-offset-gray-800 {
            box-shadow: 0 0 0 2px #2d3748;
        }

        .bg-gray-100 {
            background-color: #f7fafc;
        }

        .dark\:bg-gray-900 {
            background-color: #1a202c;
        }

        .min-h-screen {
            min-height: 100vh;
        }

        .bg-white {
            background-color: #ffffff;
        }

        .dark\:bg-gray-800 {
            background-color: #2d3748;
        }

        .shadow {
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .max-w-7xl {
            max-width: 80rem;
        }

        .mx-auto {
            margin-left: auto;
            margin-right: auto;
        }

        .py-6 {
            padding-top: 1.5rem;
            padding-bottom: 1.5rem;
        }

        .px-4 {
            padding-left: 1rem;
            padding-right: 1rem;
        }

        .sm\:px-6 {
            padding-left: 1.5rem;
            padding-right: 1.5rem;
        }

        .lg\:px-8 {
            padding-left: 2rem;
            padding-right: 2rem;
        }

        .font-sans {
            font-family: 'Poppins', sans-serif;
        }

        .antialiased {
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
        }
    </style>
</x-guest-layout>
