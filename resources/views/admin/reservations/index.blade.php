
@extends('admin.Layout.app')
@section('title', 'Liste des reservations')
@section('content')
@if (session('destroy'))
    <div class="alert alert-danger">
        {{ session('destroy') }}
    </div>
    @endif
    <div class="container mt-4">
    <h2>Liste des réservations</h2>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Utilisateur</th>
                <th>Livre</th>
                <th>Date de réservation</th>
                <th>Statut</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($reservations as $reservation)
            <tr>
                <td>{{ $reservation->id }}</td>
                <td>{{ $reservation->user->name }}</td>
                <td>{{ $reservation->livre->titre }}</td>
                <td>{{ $reservation->statut }}</td>
                <td>
                     @if ($reservation->statut === 'en attente')
                    <form action="{{ route('admin.reservations.updateStatus', $reservation->id) }}" method="POST" style="display: inline;">
                        @csrf
                        @method('PUT')
                           <input type="hidden" name="statut" value="confirmée">
                            <button class="btn btn-success btn-sm">✅ Accepter</button>
                    </form>

                    <form action="{{ route('admin.reservations.updateStatus', $reservation->id) }}" method="POST" style="display: inline;">
                         @csrf
                         @method('PUT')
                            <input type="hidden" name="statut" value="refusée">
                            <button class="btn btn-danger btn-sm">❌ Refuser</button>
                    </form>
                   @else
                    {{ $reservation->statut }}
                   @endif
                </td>
                <td>
                <form action="{{ route('admin.reservations.convert', $reservation->id) }}" method="POST" class="d-inline">
                    @csrf
                    <button type="submit" class="btn btn-success btn-sm" onclick="return confirm('Confirmer l\'emprunt de ce livre ?')">
                        Valider l'emprunt
                    </button>
                </form>
  
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
