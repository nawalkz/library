@extends('admin.Layout.app')

@section('content')
<h1 class="mb-4 text-center text-info fw-bold">👤 Détails de l'utilisateur</h1>

<div class="card shadow-lg border-0">
    <div class="card-body">
        <h4><strong>Nom :</strong> {{ $user->name }}</h4>
        <p><strong>Email :</strong> {{ $user->email }}</p>
        <p><strong>Ville :</strong> {{ $user->ville }}</p>
        <p><strong>Adresse :</strong> {{ $user->adresse }}</p>
        <p><strong>Téléphone :</strong> {{ $user->telephone }}</p>
        <p><strong>Code CIN :</strong> {{ $user->code_cin }}</p>
        <p><strong>Rôle :</strong> {{ $user->role->role }}</p>
        <p><strong>Admin ?</strong> {{ $user->isadmin ? 'Oui' : 'Non' }}</p>


        <a href="{{ route('users.edit', $user->id) }}" class="btn btn-warning mt-3">
            <i class="bi bi-pencil"></i> Modifier
        </a>
        <a href="{{ route('users.index') }}" class="btn btn-secondary mt-3">⬅️ Retour à la liste</a>
    </div>
</div>
@endsection
