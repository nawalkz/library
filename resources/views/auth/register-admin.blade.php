<x-guest-layout>
    <form method="POST" action="{{ route('register.admin') }}" enctype="multipart/form-data">
        @csrf

        <div>
            <x-input-label for="name" :value="'Nom'" />
            <x-text-input id="name" type="text" name="name" class="block mt-1 w-full" required autofocus />
        </div>

        <div class="mt-4">
            <x-input-label for="email" :value="'Email'" />
            <x-text-input id="email" type="email" name="email" class="block mt-1 w-full" required />
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
        <div class="mt-4">
            <x-input-label for="password" :value="'Mot de passe'" />
            <x-text-input id="password" type="password" name="password" class="block mt-1 w-full" required />
        </div>

        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="'Confirmer le mot de passe'" />
            <x-text-input id="password_confirmation" type="password" name="password_confirmation" class="block mt-1 w-full" required />
        </div>

        <div class="mt-4">
            <x-primary-button>
                Enregistrer Admin
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>