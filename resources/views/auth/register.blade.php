<x-guest-layout>
    <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
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
        <!-- Ville -->
        <div class="mt-4">
            <x-input-label for="ville" :value="'Ville'" />
            <x-text-input id="ville" class="block mt-1 w-full" type="text" name="ville" :value="old('ville')" required />
            <x-input-error :messages="$errors->get('ville')" class="mt-2" />
        </div>
        <!-- Adresse -->
        <div class="mt-4">
            <x-input-label for="adresse" :value="'Adresse'" />
            <x-text-input id="adresse" class="block mt-1 w-full" type="text" name="adresse" :value="old('adresse')" required />
            <x-input-error :messages="$errors->get('adresse')" class="mt-2" />
        </div>
        <!-- Téléphone -->
        <div class="mt-4">
            <x-input-label for="telephone" :value="('Téléphone')" />
            <x-text-input id="telephone" class="block mt-1 w-full" type="text" name="telephone" :value="old('telephone')" required />
            <x-input-error :messages="$errors->get('telephone')" class="mt-2" />
        </div>
        <!-- Image -->
        <div class="mt-4">
            <x-input-label for="image" :value="'Image (facultative)'" />
            <x-text-input id="image" class="block mt-1 w-full" type="file" name="image" accept="image/*" />
            <x-input-error :messages="$errors->get('image')" class="mt-2" />
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

        <!-- Role Selection -->
        <div class="mt-4">
            <x-input-label for="role_id" :value="__('Role')" />
            <select id="role_id" name="role_id" class="block mt-1 w-full" onchange="toggleCinField()" required>
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
        <div id="cin_field" class="mt-4" style="display: none;">
            <x-input-label for="code_cin" :value="__('Code CIN')" />
            <x-text-input id="code_cin" class="block mt-1 w-full" type="text" name="code_cin" :value="old('code_cin')" autocomplete="code_cin" />
            <x-input-error :messages="$errors->get('code_cin')" class="mt-2" />
        </div>

        <!-- Submit Button -->
        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>

    <script>
        // Script to show/hide the CIN field depending on selected role
        function toggleCinField() {
            var role = document.getElementById('role_id').value;
            var cinField = document.getElementById('cin_field');

            if (role == '2') { // ID 2 est pour 'Étudiant'
                cinField.style.display = 'block';
            } else {
                cinField.style.display = 'none';
            }
        }

        // Show CIN field if old input exists (after validation error)
        document.addEventListener('DOMContentLoaded', function() {
            toggleCinField();
        });
    </script>
</x-guest-layout>