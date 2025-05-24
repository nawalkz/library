<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Register</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="body">
    <div class="wrapper">
        <form method="POST" action="{{ route('register.admin') }}" enctype="multipart/form-data">
            @csrf

            <!-- Nom -->
            <div class="input-field">
                <input type="text" id="name" name="name" class="input-text" required autofocus placeholder="Name">
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>

            <!-- Email -->
            <div class="input-field">
                <input type="email" id="email" name="email" class="input-text" required placeholder="Email">
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
                <input type="password" id="password" name="password" class="input-text" required placeholder="Password">
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Confirm Password -->
            <div class="input-field">
                <input type="password" id="password_confirmation" name="password_confirmation" class="input-text" required placeholder="Password confirmation"> 
            </div>

            <!-- Submit -->
            <div class="forget">
                <button type="submit" class="register">
                    Enregistrer Admin
                </button>
            </div>
        </form>
    </div>
</body>
</html>
