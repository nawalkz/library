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
    <h2 class="text-xl font-bold mb-4">Liste des rôles</h2>

    <a href="{{ route('roles.create') }}" class="mb-4 inline-block bg-green-500 text-white px-4 py-2 rounded">Nouveau rôle</a>

    <table class="table-auto w-full border">
        <thead>
            <tr class="bg-gray-200">
                <th class="p-2">ID</th>
                <th class="p-2">Nom du rôle</th>
                <th class="p-2">Période du livre</th>
                <th class="p-2">Nombre du livre possible</th>
                <th class="p-2">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($roles as $role)
            <tr class="border-t">
                <td class="p-2">{{ $role->id }}</td>
                <td class="p-2">{{ $role->nom }}</td>
                <td class="p-2">{{ $role->période du livre}}</td>
                <td class="p-2">{{ $role->Nombre du livre possible }}</td>
                <td class="p-2">
                    <a href="{{ route('roles.edit', $role->id) }}" class="text-blue-500">Modifier</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

</body>
</html>l