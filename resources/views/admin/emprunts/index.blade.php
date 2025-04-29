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
@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<div class="container">
    <h2 class="text-xl font-bold mb-4">Liste des emprunts</h2>

    

    <table class="table-auto w-full border">
        <thead>
            <tr class="bg-gray-200">
                <th class="p-2">ID</th>
                <th class="p-2">Livre</th>
                <th class="p-2">Adhérent</th>
                <th class="p-2">Date d'emprunt</th>
                <th class="p-2">Date de retour</th>
                <th class="p-2">Etat du livre</th>
                <th class="p-2">observation</th>
                <th class="p-2">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($emprunts as $emprunt)
            <tr class="border-t">
                <td class="p-2">{{ $emprunt->id }}</td>
                <td class="p-2">{{ $emprunt->livre->titre  }}</td>
                <td class="p-2">{{ $emprunt->user->name}}</td>
                <td class="p-2">{{ $emprunt->date_emprunt }}</td>
                <td class="p-2">{{ $emprunt->date_retour }}</td>
                <td class="p-2">{{ $emprunt->etat_livre }}</td>
                <td class="p-2">{{ $emprunt->observation }}</td>
                <td class="p-2">
                    <a href="{{ route('emprunts.show', $emprunt->id) }}" class="text-blue-500">Voir</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

</body>
</html>