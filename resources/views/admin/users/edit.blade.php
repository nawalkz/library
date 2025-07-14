@extends('admin.Layout.app')

@section('title', 'Modifier l\'user')

@section('content')


<div class="container mt-5">
    <h1 class="mb-4 text-center text-primary fw-bold"> Modifier la user</h1>

    <form action="{{ route('admin.users.update', ['user' => $user->id]) }}" method="POST" class="bg-white p-4 rounded shadow-sm">
    @csrf
        @method('PUT')

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
 <!--code_cin -->
        <div class="mb-3">
            <label for="code_cin" class="form-label fw-bold">code_cin</label>
            <input type="text" name="code_cin" id="code_cin" class="form-control @error('code_cin') is-invalid @enderror" value="{{ old('code_cin') }}" required>

            @error('code_cin')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <!--role_id -->
        @php
        
        $roles = App\Models\Role::all();
    @endphp

        <div class="mb-3">
            <label for="role_id" class="form-label fw-bold">role:</label>
            <select name="role_id" id="role_id" class="form-select" >
                @foreach($roles as $role)
                    <option value="{{ $role->id }}" {{ $role->role_id == $role->id ? 'selected' : '' }}>
                        {{ $role->role }}
                    </option>
                @endforeach
            </select>
            <small class="text-danger">
                @error('role_id')
                    {{ $message }}
                @enderror
            </small>
        </div>

        <!-- Boutons de contrôle -->
        <div class="d-flex justify-content-between mt-4">
            <a href="{{ route('admin.users.index') }}" class="btn btn-outline-secondary shadow-sm">
                <i class="bi bi-arrow-left"></i> Annuler
            </a>
            <button type="submit" class="btn btn-primary shadow-sm">
                <i class="bi bi-save"></i> Enregistrer
            </button>
        </div>
    </form>
</div>
@endsection
