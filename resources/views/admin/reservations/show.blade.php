<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
</body>@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="text-xl font-bold mb-4">Détails de la réservation</h2>

    <div class="mb-4">
        <strong>Livre :</strong> {{ $reservation->livre->titre  }}
    </div>
    <div class="mb-4">
        <strong>Adhérent :</strong> {{ $reservation->user->name  }}
    </div>
    <div class="mb-4">
        <strong>Date de réservation :</strong> {{ $reservation->date_reservation }}
    </div>
    

    <a href="{{ route('reservations.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded">Retour</a>
</div>
@endsection

</html>