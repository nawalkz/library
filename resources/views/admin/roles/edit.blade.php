@extends('admin.Layout.app')

@section('title', 'Modifier l\'role')

@section('content')
<div class="container mt-5">
    <h1 class="mb-4 text-center text-primary fw-bold">🖊️ Modifier le role</h1>

    <form action="{{ route('roles.update', $role) }}" method="POST" class="bg-white p-4 rounded shadow-sm">
        @csrf
        @method('PUT')

        <!-- Nom de le role -->
        <div class="mb-3">
            <label for="role" class="form-label fw-bold">Nom de le role</label>
            <input type="text" name="role" id="role" class="form-control @error('role') is-invalid @enderror" value="{{ old('role', $role->role) }}" required>

            @error('role')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <!-- periode -->
        <div class="mb-3">
            <label for="periode" class="form-label fw-bold">Periode</label>
            <input type="text" name="periode" id="periode" class="form-control @error('periode') is-invalid @enderror" value="{{ old('periode', $periode->periode) }}" required>

            @error('periode')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

         <!-- nombre_livre -->
         <div class="mb-3">
            <label for="nombre_livre" class="form-label fw-bold">Nombre livre</label>
            <input type="text" name="nombre_livre" id="nombre_livre" class="form-control @error('nombre_livre') is-invalid @enderror" value="{{ old('nombre_livre', $nombre_livre->nombre_livre) }}" required>

            @error('nombre_livre')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Boutons de contrôle -->
        <div class="d-flex justify-content-between mt-4">
            <a href="{{ route('roles.index') }}" class="btn btn-outline-secondary shadow-sm">
                <i class="bi bi-arrow-left"></i> Annuler
            </a>
            <button type="submit" class="btn btn-primary shadow-sm">
                <i class="bi bi-save"></i> Enregistrer
            </button>
        </div>
    </form>
</div>
@endsection
