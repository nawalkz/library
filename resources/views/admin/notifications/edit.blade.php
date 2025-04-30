@extends('layouts.admin')

@section('content')
<h1 class="mb-4 text-center text-warning fw-bold">✏️ Modifier la notification</h1>

<div class="card shadow">
    <div class="card-body">
        <form action="{{ route('notifications.update', $notification->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="message" class="form-label">Message</label>
                <textarea name="message" class="form-control" rows="3">{{ old('message', $notification->message) }}</textarea>
                @error('message') <small class="text-danger">{{ $message }}</small> @enderror
            </div>
            <div class="mb-3">
                <label for="user_id" class="form-label">Étudiant</label>
                <select name="user_id" class="form-select">
                    @foreach($etudiants as $etudiant)
                        <option value="{{ $user->id }}" {{ $notification->user_id == $etudiant->id ? 'selected' : '' }}>
                            {{ $etudiant->nom }}
                        </option>
                    @endforeach
                </select>
                @error('user_id') <small class="text-danger">{{ $message }}</small> @enderror
            </div>
            <div class="mb-3">
                <label for="livre_id" class="form-label">Livre</label>
                <select name="livre_id" class="form-select">
                    @foreach($livres as $livre)
                        <option value="{{ $livre->id }}" {{ $notification->livre_id == $livre->id ? 'selected' : '' }}>
                            {{ $livre->nom }}
                        </option>
                    @endforeach
                </select>
                @error('livre_id') <small class="text-danger">{{ $message }}</small> @enderror
            </div>
            <button type="submit" class="btn btn-success">Mettre à jour</button>
            <a href="{{ route('notifications.index') }}" class="btn btn-secondary">Retour</a>
        </form>
    </div>
</div>
@endsection