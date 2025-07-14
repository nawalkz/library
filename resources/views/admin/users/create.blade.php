@extends('admin.Layout.app')

@section('title', 'Ajouter une nouvelle user')

@section('content')

<div class="container mt-5">
    <h1 class="mb-4 text-center text-success fw-bold"> Ajouter une nouvelle user</h1>

    <form action="{{ route('admin.users.store') }}" method="POST" class="bg-white p-4 rounded shadow-sm">
        @csrf


        <!--user -->
        <div class="mb-3">
            <label for="name" class="form-label fw-bold">Nom</label>
            <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" required>

            @error('name')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!--email -->
        <div class="mb-3">
            <label for="email" class="form-label fw-bold">email</label>
            <input type="mail" name="email" id="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" required>

            @error('email')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <!-- password -->
        <div class="mb-3">
            <label for="password" class="form-label fw-bold">password</label>
            <input type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror" value="{{ old('password') }}" required>

            @error('password')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <!-- Confirm Password -->
            <div class="mb-3">
                      <label for="password" class="form-label fw-bold">password confirmation</label>
                <input type="password" id="password_confirmation" name="password_confirmation"  class="form-control " required autocomplete="new-password" >
               <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
           
            </div>
        <!--  ville-->
        <div class="mb-3">
            <label for="ville" class="form-label fw-bold">ville</label>
            <input type="text" name="ville" id="ville" class="form-control @error('ville') is-invalid @enderror" value="{{ old('ville') }}" required>

            @error('ville')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <!--adresse -->
        <div class="mb-3">
            <label for="adresse" class="form-label fw-bold">adresse</label>
            <input type="text" name="adresse" id="adresse" class="form-control @error('adresse') is-invalid @enderror" value="{{ old('adresse') }}" required>

            @error('adresse')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <!--telephone -->
        <div class="mb-3">
            <label for="telephone" class="form-label fw-bold">telephone</label>
            <input type="tel" name="telephone" id="telephone" class="form-control @error('telephone') is-invalid @enderror" value="{{ old('telephone') }}" required>

            @error('telephone')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <!-- Role Selection -->
          @php

        $roles = App\Models\Role::all();
        @endphp
            <div class="mb-3">
                <select id="role_id" name="role_id"  class="form-control" onchange="toggleCinField()" required>
                    <option value="">-- Select a Role --</option>
                    @foreach ($roles as $role)
                        <option value="{{ $role->id }}" {{ old('role_id') == $role->id ? 'selected' : '' }}>
                            {{ $role->role }}
                        </option>
                    @endforeach
                </select>
                <x-input-error :messages="$errors->get('role_id')" class="mt-2" />
            </div>

            <!-- CIN Code -->
            <div id="cin_field" class="mb-3" style="display: none;">
                 <label for="telephone" class="form-label fw-bold">Code Étudiant</label>
            
                <input type="text" id="code_cin" name="code_cin"  value="{{ old('code_cin') }}" autocomplete="code_cin" placeholder="Student Code"  class="form-control">
                <x-input-error :messages="$errors->get('code_cin')" class="mt-2" />
            </div>


        <!-- Boutons de contrôle -->
        <div class="d-flex justify-content-between mt-4">
            <a href="{{ route('admin.users.index') }}" class="btn btn-outline-secondary shadow-sm">
                <i class="bi bi-arrow-left"></i> Annuler
            </a>
            <button type="submit" class="btn btn-success shadow-sm">
                <i class="bi bi-check-circle"></i> Ajouter
            </button>
        </div>
    </form>
    <!-- CIN Script -->
        <script>
            function toggleCinField() {
                var role = document.getElementById('role_id').value;
                var cinField = document.getElementById('cin_field');

                if (role == '2') { // e.g., ID 2 = Student
                    cinField.style.display = 'block';
                } else {
                    cinField.style.display = 'none';
                }
            }

            document.addEventListener('DOMContentLoaded', function () {
                toggleCinField();
            });
        </script>
</div>
@endsection