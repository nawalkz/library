@extends('admin.Layout.app')

@section('title', 'Ajouter une nouvelle categorie')

@section('content')

<div class="container mt-5">
    <h1 class="mb-4 text-center text-success fw-bold"> Ajouter une nouvelle categorie</h1>

    <form action="{{ route('admin.categories.store') }}" method="POST" class="bg-white p-4 rounded shadow-sm">
        @csrf

        <!-- Nom de l'categorie -->
        <div class="mb-3">
            <label for="categorie" class="form-label fw-bold">Nom de l'categorie</label>
            <input type="text" name="categorie" id="categorie" class="form-control @error('categorie') is-invalid @enderror" value="{{ old('categorie') }}" required>

            @error('categorie')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Boutons de contrôle -->
        <div class="d-flex justify-content-between mt-4">
            <a href="{{ route('admin.categories.index') }}" class="btn btn-outline-secondary shadow-sm">
                <i class="bi bi-arrow-left"></i> Annuler
            </a>
            <button type="submit" class="btn btn-success shadow-sm">
                <i class="bi bi-check-circle"></i> Ajouter
            </button>
        </div>
    </form>
</div>
@endsection
