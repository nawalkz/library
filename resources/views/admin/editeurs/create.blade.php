@extends('admin.Layout.app')

@section('title', 'Ajouter un nouveau editeur')

@section('content')


<div class="container mt-5">
    <h1 class="mb-4 text-center text-success fw-bold">📝 Ajouter un nouveau editeur</h1>

    <form action="{{ route('admin.editeurs.store') }}" method="POST" class="bg-white p-4 rounded shadow-sm">
        @csrf

        <!-- Nom de l'editeur -->
        <div class="mb-3">
            <label for="editeur" class="form-label fw-bold">Nom de l'editeur</label>
            <input type="text" name="editeur" id="editeur" class="form-control @error('editeur') is-invalid @enderror" value="{{ old('editeur') }}" required>

            @error('editeur')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Boutons de contrôle -->
        <div class="d-flex justify-content-between mt-4">
            <a href="{{ route('admin.editeurs.index') }}" class="btn btn-outline-secondary shadow-sm">
                <i class="bi bi-arrow-left"></i> Annuler
            </a>
            <button type="submit" class="btn btn-success shadow-sm">
                <i class="bi bi-check-circle"></i> Ajouter
            </button>
        </div>
    </form>
</div>
@endsection
