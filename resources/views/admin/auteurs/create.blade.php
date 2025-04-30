@extends('admin.Layout.app')

@section('title', 'Ajouter une nouvelle auteur')

@section('content')
<div class="container mt-5">
    <h1 class="mb-4 text-center text-success fw-bold">📝 Ajouter un nouveau auteur</h1>

    <form action="{{ route('admin.auteurs.store') }}" method="POST" class="bg-white p-4 rounded shadow-sm">
        @csrf

        <!-- l'auteur -->
        <div class="mb-3">
            <label for="auteur" class="form-label fw-bold">L'auteur</label>
            <input type="text" name="auteur" id="auteur" class="form-control @error('auteur') is-invalid @enderror" value="{{ old('auteur') }}" required>

            @error('auteur')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        

        <!-- Boutons de contrôle -->
        <div class="d-flex justify-content-between mt-4">
            <a href="{{ route('admin.auteurs.index') }}" class="btn btn-outline-secondary shadow-sm">
                <i class="bi bi-arrow-left"></i> Annuler
            </a>
            <button type="submit" class="btn btn-success shadow-sm">
                <i class="bi bi-check-circle"></i> Ajouter
            </button>
        </div>
    </form>
</div>
@endsection
