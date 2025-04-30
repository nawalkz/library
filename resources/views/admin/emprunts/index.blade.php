@extends('admin.Layout.app')
@section('content')
<div class="container mt-4">
    <h2>Liste des emprunts</h2>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Utilisateur</th>
                <th>Livre</th>
                <th>Date d'emprunt</th>
                <th>Date de retour</th>
                <th>État du livre</th>
                <th>Observation</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($emprunts as $emprunt)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $emprunt->user->name ?? 'N/A' }}</td>
                <td>{{ $emprunt->livre->titre ?? 'N/A' }}</td>
                <td>{{ $emprunt->date_emprunt }}</td>
                <td>{{ $emprunt->date_retoure }}</td>
                <td>{{ $emprunt->etat_livre }}</td>
                <td>{{ $emprunt->observation }}</td>
                <td>
                    <a href="{{ route('admin.emprunts.show', $emprunt->id) }}" class="btn btn-info btn-sm">Voir</a>

                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection