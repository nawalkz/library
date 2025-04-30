@extends('layouts.admin')

@section('content')
<h1 class="mb-4 text-center text-success fw-bold">➕ Ajouter une notification</h1>

<div class="card shadow">
    <div class="card-body">
        <form action="{{ route('notifications.store') }}" method="POST">
            @csrf
            
            <div class="mb-3">
                <label for="message" class="form-label">Message</label>
                <textarea name="message" class="form-control" rows="3">{{ old('message') }}</textarea>
                @error('message') <small class="text-danger">{{ $message }}</small> @enderror
            </div>
            
            <div class="mb-3">
                <label for="user_id" class="form-label">Étudiant</label>
                <select name="user_id" class="form-select">
                    <option value="">-- Sélectionner --</option>
                    @foreach($etudiants as $etudiant)
                        <option value="{{ $etudiant->id }}">{{ $etudiant->nom }}</option>
                    @endforeach
                </select>
                @error('user_id') <small class="text-danger">{{ $message }}</small> @enderror
            </div>
            <div class="mb-3">
                <label for="livre_id" class="form-label">Livre</label>
                <select name="livre_id" class="form-select">
                    <option value="">-- Sélectionner --</option>
                    @foreach($livres as $livre)
                        <option value="{{ $livre->id }}">{{ $livre->nom }}</option>
                    @endforeach
                </select>
                @error('livre_id') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            
            <button type="submit" class="btn btn-primary">Envoyer</button>
            <a href="{{ route('notifications.index') }}" class="btn btn-secondary">Annuler</a>
        </form>
    </div>
</div>
@endsection
