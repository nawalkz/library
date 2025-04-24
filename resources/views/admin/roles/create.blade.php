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
    <h2 class="text-xl font-bold mb-4">Ajouter un rôle</h2>

    <form action="{{ route('roles.store') }}" method="POST" class="space-y-4">
        @csrf

        <div>
            <label for="nom" class="block font-medium">Nom du rôle</label>
            <input type="text" name="nom" id="nom" class="border rounded w-full p-2" required>
        </div>
        <div>
            <label for="nom" class="block font-medium">Période du livre</label>
            <input type="text" name="nom" id="nom" class="border rounded w-full p-2" required>
        </div>
        <div>
            <label for="nom" class="block font-medium">Nombre du livre possible</label>
            <input type="text" name="nom" id="nom" class="border rounded w-full p-2" required>
        </div>
        <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded">Ajouter</button>
    </form>
</div>
@endsection

</body>
</html>