@extends('admin.Layout.app')

@section('content')
<div class="container mt-4">
    <h2>Détails de l'emprunt</h2>
    <ul class="list-group">
        <li class="list-group-item"><strong>Utilisateur:</strong> {{ $emprunt->user->name ?? 'N/A' }}</li>
        <li class="list-group-item"><strong>Livre:</strong> {{ $emprunt->livre->titre ?? 'N/A' }}</li>
        <li class="list-group-item"><strong>Date d'emprunt:</strong> {{ $emprunt->date_emprunt }}</li>
        <li class="list-group-item"><strong>Date de retour:</strong> {{ $emprunt->date_reteure }}</li>
        <li class="list-group-item"><strong>État du livre:</strong> {{ $emprunt->etat_livre }}</li>
        <li class="list-group-item"><strong>Observation:</strong> {{ $emprunt->observation }}</li>
    </ul>
</div>
@endsection
