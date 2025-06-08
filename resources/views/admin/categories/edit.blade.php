@extends('admin.Layout.app')

@section('title', 'Modifier l\'categorie')

@section('content')


<div class="container mt-5">
    <h1 class="mb-4 text-center text-primary fw-bold"> Modifier la categorie</h1>

    <form action="{{ route('admin.categories.update', ['categorie' => $categorie->id]) }}" method="POST" class="bg-white p-4 rounded shadow-sm">
    @csrf
        @method('PUT')

        <!-- Nom de l'categorie -->
        <div class="mb-3">
            <label for="categorie" class="form-label fw-bold">Nom du categorie</label>
            <input type="text" name="categorie" id="categorie" class="form-control @error('categorie') is-invalid @enderror" value="{{ old('categorie', $categorie->categorie) }}" required>

            @error('categorie')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Boutons de contrôle -->
        <div class="d-flex justify-content-between mt-4">
            <a href="{{ route('admin.categories.index') }}" class="btn btn-outline-secondary shadow-sm">
                <i class="bi bi-arrow-left"></i> Annuler
            </a>
            <button type="submit" class="btn btn-primary shadow-sm">
                <i class="bi bi-save"></i> Enregistrer
            </button>
        </div>
    </form>
</div>
@endsection
