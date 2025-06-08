@extends('admin.Layout.app')

@section('title', 'Ajouter un nouveau role')

@section('content')


<div class="container mt-5">
    <h1 class="mb-4 text-center text-success fw-bold"> Ajouter un nouveau role</h1>

    <form action="{{ route('admin.roles.store') }}" method="POST" class="bg-white p-4 rounded shadow-sm">
        @csrf

        <!-- Nom de l'role -->
        <div class="mb-3">
            <label for="role" class="form-label fw-bold">Nom du role</label>
            <input type="text" name="role" id="role" class="form-control @error('role') is-invalid @enderror" value="{{ old('role') }}" required>

            @error('role')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <!-- periode -->
        <div class="mb-3">
            <label for="periode" class="form-label fw-bold">Periode</label>
            <input type="text" name="periode" id="periode" class="form-control @error('periode') is-invalid @enderror" value="{{ old('periode') }}" required>

            @error('periode')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
 <!-- nombre livre  -->

        <div class="mb-3">
            <label for="nombre_livre" class="form-label fw-bold">Nombre livre</label>
            <input type="text" name="nombre_livre" id="nombre_livre" class="form-control @error('nombre_livre') is-invalid @enderror" value="{{ old('nombre_livre') }}" required>

            @error('nombre_livre')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        

        <!-- Boutons de contrôle -->
        <div class="d-flex justify-content-between mt-4">
            <a href="{{ route('admin.roles.index') }}" class="btn btn-outline-secondary shadow-sm">
                <i class="bi bi-arrow-left"></i> Annuler
            </a>
            <button type="submit" class="btn btn-success shadow-sm">
                <i class="bi bi-check-circle"></i> Ajouter
            </button>
        </div>
    </form>
</div>
@endsection
