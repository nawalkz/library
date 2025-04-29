@extends('admin.Layout.app')

@section('title', 'Modifier l\'livre')

@section('content')


<div class="container mt-5">
    <h1 class="mb-4 text-center text-primary fw-bold">🖊️ Modifier le livre</h1>
    @php
        $categories = App\Models\Categorie::all();
        $auteurs = App\Models\Auteur::all();
        $editeurs = App\Models\Editeur::all();
    @endphp
    <form action="{{ route('livres.update', $livre) }}" method="POST" class="bg-white p-4 rounded shadow-sm">
        @csrf
        @method('PUT')

       <!-- categorie -->
       <div class="mb-3">
            <label for="categorie_id" class="form-label fw-bold">Categorie:</label>
            <select name="categorie_id" id="categorie_id" class="form-select" required>
                @foreach($categories as $categorie)
                    <option value="{{ $categorie->id }}" {{ $livre->categorie_id == $categorie->id ? 'selected' : '' }}>
                        {{ $categorie->categorie }}
                </option>
                @endforeach
            </select>
            <small class="text-danger">
                @error('categorie_id')
                    {{ $message }}
                @enderror
            </small>
        </div>
         <!-- Auteur -->
         <div class="mb-3">
            <label for="auteur_id" class="form-label fw-bold">Auteur:</label>
            <select name="auteur_id" id="auteur_id" class="form-select" required>
                @foreach($auteurs as $auteur)
                    <option value="{{ $auteur->id }}" {{ $livre->auteur_id == $auteur->id ? 'selected' : '' }}>
                        {{ $auteur->auteur }}
                    </option>
                @endforeach
            </select>
            <small class="text-danger">
                @error('auteur_id')
                    {{ $message }}
                @enderror
            </small>
        </div>
 <!-- Editeur -->
 <div class="mb-3">
            <label for="editeur_id" class="form-label fw-bold">Editeur:</label>
            <select name="editeur_id" id="editeur_id" class="form-select" required>
                @foreach($editeurs as $editeur)
                    <option value="{{ $editeur->id }}" {{ $livre->editeur_id == $editeur->id ? 'selected' : '' }}>
                        {{ $editeur->editeur }}
                    </option>
                @endforeach
            </select>
            <small class="text-danger">
                @error('editeur_id')
                    {{ $message }}
                @enderror
            </small>
        </div>
        <!-- titre -->
 <div class="mb-3">
            <label for="titre" class="form-label fw-bold">Titre:</label>
            <input
                type="text"
                class="form-control"
                name="titre"
                id="titre" value="{{ $livre->titre }}" 
                required>
            <small class="text-danger">
                @error('titre')
                    {{ $message }}
                @enderror
            </small>
        </div>
         <!-- Nombre inventaire -->
       <div class="mb-3">
            <label for="nombre_inventaire" class="form-label fw-bold">Nombre inventaire:</label>
            <input
                type="text"
                class="form-control"
                name="nombre_inventaire"
                id="nombre_inventaire" value="{{ $livre->nombre_inventaire }}"
                required>
            <small class="text-danger">
                @error('nombre_inventaire')
                    {{ $message }}
                @enderror
            </small>
        </div>
         
       <!-- Nombre page -->
       <div class="mb-3">
            <label for="nombre_page" class="form-label fw-bold">Nombre page:</label>
            <input
                type="number"
                class="form-control"
                name="nombre_page"
                id="nombre_page" value="{{ $livre->nombre_page }}"
                required>
            <small class="text-danger">
                @error('nombre_page')
                    {{ $message }}
                @enderror
            </small>
        </div>
        <!-- Edition -->
        <div class="mb-3">
            <label for="edition" class="form-label fw-bold">Edition:</label>
            <input
                type="date"
                class="form-control"
                name="edition"
                id="edition" value="{{ $livre->edition }}"
                required>
            <small class="text-danger">
                @error('edition')
                    {{ $message }}
                @enderror
            </small>
        </div>

        <!-- Isbn -->
        <div class="mb-3">
            <label for="isbn" class="form-label fw-bold">ISBN:</label>
            <input
                type="number"
                class="form-control"
                name="isbn"
                id="isbn" value="{{ $livre->edition }}"
                >
            <small class="text-danger">
                @error('isbn')
                    {{ $message }}
                @enderror
            </small>
        </div>
        </div>
      
        <!-- Image Upload -->
        <div class="mb-3">
                <label for="image" class="form-label">Image:</label>
                <input type="file" class="form-control" name="image" id="image">
                @if ($livre->image)
                    <div class="mt-2">
                        <img src="{{ asset('storage/' . $livre->image) }}" alt="livre Image" width="100">
                    </div>
                @endif
            </div>
        <!-- Boutons de contrôle -->
        <div class="d-flex justify-content-between mt-4">
            <a href="{{ route('livres.index') }}" class="btn btn-outline-secondary shadow-sm">
                <i class="bi bi-arrow-left"></i> Annuler
            </a>
            <button type="submit" class="btn btn-primary shadow-sm">
                <i class="bi bi-save"></i> Enregistrer
            </button>
        </div>
    </form>
</div>
@endsection
