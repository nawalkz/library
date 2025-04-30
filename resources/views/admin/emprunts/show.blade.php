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
    <h2 class="text-xl font-bold mb-4">Détails de l'emprunt</h2>

    <div class="mb-4">
        <strong>Livre :</strong> {{ $emprunt->livre->titre  }}
    </div>
    <div class="mb-4">
        <strong>Adhérent :</strong> {{ $emprunt->user->name  }}
    </div>
    <div class="mb-4">
        <strong>Date d'emprunt :</strong> {{ $emprunt->date_emprunt }}
    </div>
    <div class="mb-4">
        <strong>Date de retour :</strong> {{ $emprunt->date_retour }}
    </div>
    <a href="{{ route('admin.emprunts.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded">Retour</a>
</div>
@endsection

</body>
</html>