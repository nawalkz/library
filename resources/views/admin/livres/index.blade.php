@extends('admin.Layout.app')

@section('title', 'Liste des livres')

@section('content')
@if (session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif
@if (session('update'))
<div class="alert alert-primary">
    {{ session('update') }}
</div>
@endif
@if (session('destroy'))
<div class="alert alert-danger">
    {{ session('destroy') }}
</div>
@endif


<h1 class="mb-4 text-center text-dark fw-bold"> Liste des livres</h1>




<!-- Bouton pour ajouter une nouvelle livre -->
<div class="d-flex justify-content-end mb-3">
    <a href="{{ route('admin.livres.create') }}" class="btn btn-success shadow">
        <i class="bi bi-plus-circle"></i> Ajouter un nouveau livre
    </a>
</div>

<!-- Liste des livres -->
<div class="card shadow-lg border-0">
    <div class="card-header bg-gray text-dark fw-bold">
        <i class="bi bi-list-task"></i> livres
    </div>
    <div class="card-body">
        @if($livres->isEmpty())
        <div class="alert alert-info text-center py-4" livre="alert">
            <i class="bi bi-info-circle-fill me-2"></i>
            🚀 Aucun livre . Ajoutez-en un maintenant !
        </div>
        @else
        <div class="table-responsive">
            <table class="table table-hover align-middle text-center">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Titre</th>
                        <th>ISBN</th>
                        <th>Auteur</th>
                        <th>Editeure</th>
                        <th>Categorie</th>
                        <th>Edition</th>
                        <th>Nombre de page</th>
                        <th>Nombre d'inventaire</th>
                        <th>Statut</th>
                        <th>Image</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($livres as $livre)
                    <tr>
                        <td>{{ ($livres->currentPage() - 1) * $livres->perPage() + $loop->iteration }}</td>

                        <td class="fw-bold">{{ $livre->titre }}</td>
                        <td class="fw-bold">{{ $livre->isbn }}</td>
                       
                         <td class="fw-bold">{{ $livre->auteur?->auteur ?? 'N/A' }}</td>
                        <td class="fw-bold">{{ $livre->editeur?->editeur ?? 'N/A' }}</td>

                        <td class="fw-bold">{{ $livre->categorie?->categorie ?? 'N/A'}}</td>
                        <td class="fw-bold">{{ $livre->edition}}</td>
                        <td class="fw-bold">{{ $livre->nombre_page}}</td>
                        <td class="fw-bold">{{ $livre->nombre_inventaire}}</td>
                        <td class="fw-bold">{{ $livre->statut}}</td>
                        <td>
                            <img src="{{ asset('storage/' . $livre->image) }}" alt="Livre Image" width="50" height="50">
                        </td>
                        <td>
                            <a href="{{ route('admin.livres.edit', $livre->id) }}" class="btn btn-warning btn-sm shadow">
                                <i class="bi bi-pencil-square"></i>
                            </a>
                            <form action="{{ route('admin.livres.destroy', $livre->id) }}" method="POST" class="d-inline delete-form" onsubmit="confirmDelete(event, this)">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm shadow">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Pagination améliorée -->
        <div class="mt-3 d-flex justify-content-center align-items-center gap-2">
            <!-- Aller à la première page -->
            @if(!$livres->onFirstPage())
            <a href="{{ $livres->url(1) }}" class="btn btn-outline-primary shadow-sm">
                <i class="bi bi-chevron-double-left"></i> Première
            </a>
            @endif

            <!-- Bouton -5 pages -->
            @if($livres->currentPage() > 5)
            <a href="{{ $livres->url($livres->currentPage() - 5) }}" class="btn btn-outline-secondary shadow-sm">
                <i class="bi bi-arrow-left-circle"></i> -5
            </a>
            @endif

            <!-- Pagination Laravel -->
            {{ $livres->links('pagination::bootstrap-5') }}

            <!-- Bouton +5 pages -->
            @if($livres->currentPage() + 5 <= $livres->lastPage())
                <a href="{{ $livres->url($livres->currentPage() + 5) }}" class="btn btn-outline-secondary shadow-sm">
                    +5 <i class="bi bi-arrow-right-circle"></i>
                </a>
                @endif

                <!-- Aller à la dernière page -->
                @if($livres->currentPage() < $livres->lastPage())
                    <a href="{{ $livres->url($livres->lastPage()) }}" class="btn btn-outline-primary shadow-sm">
                        Dernière <i class="bi bi-chevron-double-right"></i>
                    </a>
                    @endif
        </div>
        @endif
    </div>
</div>

@endsection