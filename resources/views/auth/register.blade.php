<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register</title>
     @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    </head>
    <body class="body">
       <div class="wrapper">
    <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
        @csrf

        <!-- Name -->
        <div  class="input-field">
            <input type="text" id="name" name="name" class="input-text" value="{{ old('name') }}" required autofocus autocomplete="name" placeholder="Name">
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
       </div>

        <!-- Email -->
        <div class="input-field">
            <input type="email" id="email" name="email" class="input-text" value="{{ old('email') }}" required autocomplete="username" placeholder="Email">
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
</div>

        <!-- Ville -->
        <div class="input-field">
            <input type="text" id="ville" name="ville" class="input-text" value="{{ old('ville') }}" required placeholder="Ville">
            <x-input-error :messages="$errors->get('ville')" class="mt-2" />
       </div>

        <!-- Adresse -->
        <div class="input-field">
            <input type="text" id="adresse" name="adresse" class="input-text" value="{{ old('adresse') }}" required placeholder="Adresse">
            <x-input-error :messages="$errors->get('adresse')" class="mt-2" />
       </div>

        <!-- Téléphone -->
        <div class="input-field">
            <input type="text" id="telephone" name="telephone" class="input-text" value="{{ old('telephone') }}" required placeholder="Telephone">
            <x-input-error :messages="$errors->get('telephone')" class="mt-2" />
       </div>

        <!-- Image -->
        <div class="input-field">
            <input type="file" id="image" name="image" class="input-text" accept="image/*" placeholder="Image">
            <x-input-error :messages="$errors->get('image')" class="mt-2" />
       </div>

        <!-- Password -->
        <div class="input-field">
            <input type="password" id="password" name="password" class="input-text" required autocomplete="new-password" placeholder="Password">
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
       </div>

        <!-- Confirm Password -->
        <div class="input-field">
            <input type="password" id="password_confirmation" name="password_confirmation" class="input-text" required autocomplete="new-password" placeholder="Password confirmation">
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
       </div>

        <!-- Role Selection -->
        <div class="input-field">
            <select id="role_id" name="role_id" class="input-text" onchange="toggleCinField()" required>
                <option value="">-- Choisir un rôle --</option>
                @foreach ($roles as $role)
                    <option value="{{ $role->id }}" {{ old('role_id') == $role->id ? 'selected' : '' }}>
                        {{ $role->role }}
                    </option>
                @endforeach
            </select>
            <x-input-error :messages="$errors->get('role_id')" class="mt-2" />
       </div>

        <!-- Code CIN -->
        <div id="cin_field" class="input-field" style="display: none;">
            
            <input type="text" id="code_cin" name="code_cin" class="input-text" value="{{ old('code_cin') }}" autocomplete="code_cin" placeholder="Code Cin">
            <x-input-error :messages="$errors->get('code_cin')" class="mt-2" />
       </div>

        <!-- Submit -->
        <div class="forget">
            <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>
            <x-primary-button class="register">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>

    <!-- Script CIN -->
    <script>
        function toggleCinField() {
            var role = document.getElementById('role_id').value;
            var cinField = document.getElementById('cin_field');

            if (role == '2') { // مثلا ID 2 = Étudiant
                cinField.style.display = 'block';
            } else {
                cinField.style.display = 'none';
            }
        }

        document.addEventListener('DOMContentLoaded', function () {
            toggleCinField();
        });
    </script>

