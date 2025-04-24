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
    <h2 class="text-xl font-bold mb-4">Liste des livres</h2>

    <a href="{{ route('livres.create') }}" class="mb-4 inline-block bg-green-500 text-white px-4 py-2 rounded">Ajouter un livre</a>

    <table class="table-auto w-full border">
        <thead>
            <tr class="bg-gray-200">
                <th class="p-2">ID</th>
                <th class="p-2">Titre</th>
                <th class="p-2">ISBN</th>
                <th class="p-2">Auteur</th>
                <th class="p-2">Editeure</th>
                <th class="p-2">Categorie</th>
                <th class="p-2">Edition</th>
                <th class="p-2">Nombre de page</th>
                <th class="p-2">Nombre d'inventaire</th>
                <th class="p-2">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($livres as $livre)
            <tr class="border-t">
                <td class="p-2">{{ $livre->id }}</td>
                <td class="p-2">{{ $livre->titre }}</td>
                <td class="p-2">{{ $livre->isbn }}</td>
                <td class="p-2">{{ $livre->auteur }}</td>
                <td class="p-2">{{ $livre->editeure }}</td>
                <td class="p-2">{{ $livre->categorie }}</td>
                <td class="p-2">{{ $livre->edition }}</td>
                <td class="p-2">{{ $livre->nb_de_page }}</td>
                <td class="p-2">{{ $livre->nb_inventaire }}</td>
                <td class="p-2">
                    <a href="{{ route('livres.edit', $livre->id) }}" class="text-blue-500">Modifier</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

</body>
</html>