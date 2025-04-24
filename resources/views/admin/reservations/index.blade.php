<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="text-xl font-bold mb-4">Liste des réservations</h2>

    

    <table class="table-auto w-full border">
        <thead>
            <tr class="bg-gray-200">
                <th class="p-2">ID</th>
                <th class="p-2">Livre</th>
                <th class="p-2">Adhérent</th>
                <th class="p-2">Date de réservation</th>
                <th class="p-2">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($reservations as $reservation)
            <tr class="border-t">
                <td class="p-2">{{ $reservation->id }}</td>
                <td class="p-2">{{ $reservation->livre->titre  }}</td>
                <td class="p-2">{{ $reservation->user->name   }}</td>
                <td class="p-2">{{ $reservation->date_reservation }}</td>
                <td class="p-2">
                    <a href="{{ route('reservations.show', $reservation->id) }}" class="text-blue-500">Voir</a>
                </td>

            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
 
</body>
</html>