@extends('admin.Layout.app')

@section('content')
<div class="container">
    <h2>Modifier la date de retour</h2>

    
    <form action="{{ route('admin.emprunts.update', $emprunt->id) }}" method="POST" enctype="multipart/form-data" class="bg-white p-4 rounded shadow-sm">
    @csrf
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="date_reteure" class="form-label">Date de retour</label>
            <input type="date" class="form-control" id="date_reteure" name="date_reteure" value="{{ $emprunt->date_reteure }}">
        </div>

        <button type="submit" class="btn btn-success">Mettre à jour</button>
    </form>
</div>
@endsection
