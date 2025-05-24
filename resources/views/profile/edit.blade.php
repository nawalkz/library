@extends('layouts.profile')

@section('content')
    <div class="profile-container">
        <h2>👤 Mon Profil</h2>

        <!-- Profile Info Section -->
        <div class="profile-section">
            <h3>🧾 Profile Information</h3>
            <p>Update your account's profile information and email address.</p>

            <form method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data">
                @csrf
                @method('PATCH')

                <div class="form-group">
                    <label for="name">Nom</label>
                    <input type="text" name="name" value="{{ old('name', Auth::user()->name) }}" required>
                </div>

                <div class="form-group">
                    <label for="email">Adresse Email</label>
                    <input type="email" name="email" value="{{ old('email', Auth::user()->email) }}" required>
                </div>

                <div class="form-group">
                    <label for="adresse">Adresse</label>
                    <input type="text" name="adresse" value="{{ old('adresse', Auth::user()->adresse) }}">
                </div>

                <div class="form-group">
                    <label for="telephone">Téléphone</label>
                    <input type="text" name="telephone" value="{{ old('telephone', Auth::user()->telephone) }}">
                </div>

                <div class="form-group">
                    <label for="ville">Ville</label>
                    <input type="text" name="ville" value="{{ old('ville', Auth::user()->ville) }}">
                </div>

                <div class="form-group">
                    <label for="image">Image</label>
                    <input type="file" name="image">
                </div>

                <button type="submit" class="submit-button">Enregistrer</button>
            </form>
        </div>

        <!-- Update Password Section -->
        <div class="profile-section">
            <h3>🔐 Modifier le mot de passe</h3>
            <p>Utilisez un mot de passe long et sécurisé pour protéger votre compte.</p>

            <form method="POST" action="{{ route('password.update') }}">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="current_password">Mot de passe actuel</label>
                    <input type="password" name="current_password" required>
                </div>

                <div class="form-group">
                    <label for="password">Nouveau mot de passe</label>
                    <input type="password" name="password" required>
                </div>

                <div class="form-group">
                    <label for="password_confirmation">Confirmer le mot de passe</label>
                    <input type="password" name="password_confirmation" required>
                </div>

                <button type="submit" class="submit-button">Enregistrer</button>
            </form>
        </div>

        <!-- Delete Account Section -->
        <div class="delete-account-section">
            <h3>⚠️ Supprimer le compte</h3>
            <p>Une fois votre compte supprimé, toutes ses ressources et données seront définitivement supprimées. Veuillez sauvegarder vos données importantes.</p>

            <form method="POST" action="{{ route('profile.destroy') }}">
                @csrf
                @method('DELETE')

                <button type="submit" class="delete-button">Supprimer le compte</button>
            </form>
        </div>
    </div>
@endsection
