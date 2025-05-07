@extends('user.layouts.app')

@section('content')
<div class="container mt-4">

    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <h3>Réserver un livre</h3>

    <div class="card mt-3">
        <div class="card-body">
            <h5 class="card-title">{{ $livre->titre }}</h5>
            <p class="card-text"><strong>Auteur:</strong> {{ $livre->auteur_id }}</p>
            <p class="card-text"><strong>Catégorie:</strong> {{ $livre->categorie_id }}</p>
            <p class="card-text"><strong>Disponible:</strong> {{ $livre->nombre_inventaire> 0 ? 'Oui' : 'Non' }}</p>

            @if ($livre->nombre_inventaire > 0)
                <form action="{{ route('reservations.store') }}" method="POST">
                    @csrf
                    <input type="hidden" name="livre_id" value="{{ $livre->id }}">
                    <button type="submit" class="btn btn-primary">Confirmer la réservation</button>
                </form>
            @else
                <div class="alert alert-warning">Ce livre n’est pas disponible actuellement.</div>
            @endif
        </div>
    </div>

</div>
@endsection
