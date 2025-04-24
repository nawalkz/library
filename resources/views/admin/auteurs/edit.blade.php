@extends('admin.Layout.app')

@section('title', 'Modifier l\'auteur')

@section('content')
<div class="container mt-5">
    <h1 class="mb-4 text-center text-primary fw-bold">🖊️ Modifier l'auteur</h1>

    <form action="{{ route('auteurs.update', $auteur) }}" method="POST" class="bg-white p-4 rounded shadow-sm">
        @csrf
        @method('PUT')

        <!-- Nom de l'auteur -->
        <div class="mb-3">
            <label for="nom" class="form-label fw-bold">Nom de l'auteur</label>
            <input type="text" name="nom" id="nom" class="form-control @error('nom') is-invalid @enderror" value="{{ old('nom', $nom->nom) }}" required>

            @error('nom')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <!-- Prenom de l'auteur -->
        <div class="mb-3">
            <label for="prenom" class="form-label fw-bold">Prenom de l'auteur</label>
            <input type="text" name="prenom" id="prenom" class="form-control @error('prenom') is-invalid @enderror" value="{{ old('prenom', $prenom->prenom) }}" required>

            @error('prenom')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Boutons de contrôle -->
        <div class="d-flex justify-content-between mt-4">
            <a href="{{ route('auteurs.index') }}" class="btn btn-outline-secondary shadow-sm">
                <i class="bi bi-arrow-left"></i> Annuler
            </a>
            <button type="submit" class="btn btn-primary shadow-sm">
                <i class="bi bi-save"></i> Enregistrer
            </button>
        </div>
    </form>
</div>
@endsection
