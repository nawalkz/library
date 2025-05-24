<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="body">
    <div class="wrapper">
        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email -->
            <div class="input-field">
                <input type="email" id="email" name="email" class="input-text" value="{{ old('email') }}" required autofocus autocomplete="username" placeholder="Email">
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- Password -->
            <div class="input-field">
                <input type="password" id="password" name="password" class="input-text" required autocomplete="current-password" placeholder="Password">
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Remember Me -->
            <div class="input-field">
                <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me" type="checkbox" name="remember" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500">
                    <span class="ms-2 text-sm text-gray-600">Remember me</span>
                </label>
            </div>

            <!-- Submit + Forgot Password -->
            <div class="forget">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                        Forgot your password?
                    </a>
                @endif

                <x-primary-button class="register">
                    Log in
                </x-primary-button>
            </div>
        </form>
    </div>
</body>
</html>
