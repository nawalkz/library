@extends('admin.Layout.app')

@section('title', 'Liste des auteurs')

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
    <h1 class="mb-4 text-center text-primary fw-bold">📌 Liste des auteurs</h1>




    <!-- Bouton pour ajouter une nouvelle auteur -->
    <div class="d-flex justify-content-end mb-3">
        <a href="{{ route('admin.auteurs.create') }}" class="btn btn-success shadow">
            <i class="bi bi-plus-circle"></i> Ajouter un nouveau auteur
        </a>
    </div>

    <!-- Liste des auteurs -->
    <div class="card shadow-lg border-0">
        <div class="card-header bg-primary text-white fw-bold">
            <i class="bi bi-list-task"></i> auteurs 
        </div>
        <div class="card-body">
            @if($auteurs->isEmpty())
                <div class="alert alert-info text-center py-4" role="alert">
                    <i class="bi bi-info-circle-fill me-2"></i>
                    🚀 Aucun auteur . Ajoutez-en un maintenant !
                </div>
            @else
                <div class="table-responsive">
                    <table class="table table-hover align-middle text-center">
                        <thead class="table-dark">
                            <tr>
                                <th>Id</th>
                                <th>L'auteur</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($auteurs as $auteur)
                                <tr>
                                    <td>{{ ($auteurs->currentPage() - 1) * $auteurs->perPage() + $loop->iteration }}</td>
                                    <td class="fw-bold">{{ $auteur->auteur }}</td>
                
                                    <td>
                                        <a href="{{ route('admin.auteurs.edit', $auteur->id) }}" class="btn btn-warning btn-sm shadow">
                                            <i class="bi bi-pencil-square"></i>
                                        </a>
                                        <form action="{{ route('admin.auteurs.destroy', $auteur->id) }}" method="POST" class="d-inline delete-form"  onsubmit="confirmDelete(event, this)">
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
                    @if(!$auteurs->onFirstPage())
                        <a href="{{ $auteurs->url(1) }}" class="btn btn-outline-primary shadow-sm">
                            <i class="bi bi-chevron-double-left"></i> Première
                        </a>
                    @endif

                    <!-- Bouton -5 pages -->
                    @if($auteurs->currentPage() > 5)
                        <a href="{{ $auteurs->url($auteurs->currentPage() - 5) }}" class="btn btn-outline-secondary shadow-sm">
                            <i class="bi bi-arrow-left-circle"></i> -5
                        </a>
                    @endif

                    <!-- Pagination Laravel -->
                    {{ $auteurs->links('pagination::bootstrap-5') }}

                    <!-- Bouton +5 pages -->
                    @if($auteurs->currentPage() + 5 <= $auteurs->lastPage())
                        <a href="{{ $auteurs->url($auteurs->currentPage() + 5) }}" class="btn btn-outline-secondary shadow-sm">
                            +5 <i class="bi bi-arrow-right-circle"></i>
                        </a>
                    @endif

                    <!-- Aller à la dernière page -->
                    @if($auteurs->currentPage() < $auteurs->lastPage())
                        <a href="{{ $auteurs->url($auteurs->lastPage()) }}" class="btn btn-outline-primary shadow-sm">
                            Dernière <i class="bi bi-chevron-double-right"></i>
                        </a>
                    @endif
                </div>
            @endif
        </div>
    </div>

@endsection
