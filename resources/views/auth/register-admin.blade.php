<x-guest-layout>
    <form method="POST" action="{{ route('register.admin') }}">
        @csrf

        <div>
            <x-input-label for="name" :value="'Nom'" />
            <x-text-input id="name" type="text" name="name" class="block mt-1 w-full" required autofocus />
        </div>

        <div class="mt-4">
            <x-input-label for="email" :value="'Email'" />
            <x-text-input id="email" type="email" name="email" class="block mt-1 w-full" required />
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